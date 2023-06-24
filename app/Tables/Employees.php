<?php

namespace App\Tables;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Stmt\Label;

class Employees extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%")
                        ->orWhere('middle_name', 'LIKE', "%{$value}%")
                        ->orWhere('department_id', 'LIKE', "%{$value}%")
                        ->orWhere('country_id', 'LIKE', "%{$value}%")
                        ->orWhere('state_id', 'LIKE', "%{$value}%")
                        ->orWhere('city_id', 'LIKE', "%{$value}%")
                        ->orWhere('zip_code', 'LIKE', "%{$value}%")
                        ->orWhere('birth_date', 'LIKE', "%{$value}%")
                        ->orWhere('date_hired', 'LIKE', "%{$value}%");
                });
            });
        });
 
        return QueryBuilder::for(Employee::class)
            ->defaultSort('id')
            ->allowedSorts(['first_name', 'last_name'])
            ->allowedFilters(['first_name', 'last_name','department_id' ,'country_id', 'state_id', 'city_id',$globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id'])
            ->column('id', sortable: true)
            ->column('first_name', sortable: true)
            ->column('last_name', sortable: true)
            ->column('middle_name')
            ->column('department.name')
            ->column('country.name')
            ->column('state.name')
            ->column('city.name')
            ->column('zip_code')
            ->column('birth_date')
            ->column('date_hired')
            ->column('action')
            ->selectFilter(key: 'department_id', label: 'Depearment', options:Department::pluck('name', 'id')->toArray())
            ->paginate(15);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
