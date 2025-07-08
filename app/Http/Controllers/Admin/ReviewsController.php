<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReviewRequest;
use App\Models\Review;
use Gate;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Get filter parameters from request
        $selectedMonth = $request->get('month', 'all');
        $selectedYear = $request->get('year', 'all');

        if ($selectedYear && $selectedYear != 'all') {
            if ($selectedMonth && $selectedMonth != 'all') {
                // Filter by specific month in year
                $startDate = $selectedYear . '-' . $selectedMonth . '-01';
                $endDate = date('Y-m-t', strtotime($startDate));
            } else {
                // Filter by whole year
                $startDate = $selectedYear . '-01-01';
                $endDate = $selectedYear . '-12-31';
            }
        } else {
            // No date filtering - show all data
            $startDate = null;
            $endDate = null;
        }


        $settings1 = [
            'chart_title'           => 'التقييمات',
            'chart_type'            => 'doughnut',
            'report_type'           => 'group_by_string',
            'model'                 => 'App\Models\Review',
            'group_by_field'        => 'review',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'range_date_start'      => $startDate,
            'range_date_end'        => $endDate,
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'review',
        ];

        $chart1 = new LaravelChart($settings1);

        if ($request->ajax()) {

            $query = Review::with(['role'])->select(sprintf('%s.*', (new Review)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'review_show';
                $editGate      = 'review_edit';
                $deleteGate    = 'review_delete';
                $crudRoutePart = 'reviews';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('identity_number', function ($row) {
                return $row->identity_number ? $row->identity_number : '';
            });
            $table->editColumn('role.title', function ($row) {
                return $row->role->title ? $row->role->title : '';
            });
            $table->editColumn('review', function ($row) {
                return (Review::REVIEW_RADIO[$row->review] ?? '') . '<br>' . ($row->review == 'not_good' ? $row->reason : '');
            });

            $table->rawColumns(['actions', 'placeholder','role','review']);

            return $table->make(true);
        }

        return view('admin.reviews.index', compact('selectedMonth', 'selectedYear', 'chart1'));
    }

    public function destroy(Review $review)
    {
        abort_if(Gate::denies('review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $review->delete();

        return back();
    }

    public function massDestroy(MassDestroyReviewRequest $request)
    {
        $reviews = Review::find(request('ids'));

        foreach ($reviews as $review) {
            $review->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
