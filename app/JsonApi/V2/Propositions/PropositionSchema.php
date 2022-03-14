<?php

namespace Inspirium\JsonApi\V2\Propositions;

use Inspirium\BookProposition\Models\BookProposition as Proposition;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Eloquent\Fields\Boolean;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Fields\Relations\HasOne;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Filters\Has;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;
use LaravelJsonApi\Eloquent\Fields\ArrayList;

class PropositionSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Proposition::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('projectName'),
            Str::make('projectNumber'),
            Str::make('additionalProjectNumber'),
            Str::make('title'),
            Str::make('status'),
            Str::make('concept'),
            Str::make('manuscript'),
            Boolean::make('dotation'),
            Str::make('dotationOrigin'),
            Str::make('dotationAmount'),
            ArrayList::make('possibleProducts'),
            ArrayList::make('schoolLevel'),
            Boolean::make('schoolAssignment'),
            Str::make('mainTarget'),
            ArrayList::make('additions'),
            Str::make('circulations'),
            Number::make('numberOfPages'),
            Str::make('width'),
            Str::make('height'),
            Str::make('paperType'),
            Str::make('additionalWork'),
            Number::make('colors'),
            Number::make('colorsFirstPage'),
            Str::make('coverType'),
            Str::make('coverPaperType'),
            Number::make('coverColors'),
            Str::make('coverPlastification'),
            Boolean::make('filmPrint'),
            Boolean::make('blindPrint'),
            Boolean::make('uvPrint'),
            Str::make('bookBinding'),
            DateTime::make('deadline'),
            Str::make('priority'),
            Str::make('expenses'),
            ArrayHash::make('priceFirstYear'),
            ArrayHash::make('priceSecondYear'),
            Str::make('retailPrice'),
            Boolean::make('approved'),
            HasOne::make('approvedBy')->type('employees'),
            DateTime::make('approvedOn'),
            Str::make('coverpaperPaperType'),
            Number::make('coverpaperColors'),
            Str::make('coverpaperPlastification'),
            Str::make('coverpaperUvPrint'),
            Str::make('coverpaperFilmPrint'),
            Str::make('coverpaperBlindPrint'),
            Str::make('finalPrintPrice'),
            Str::make('finalCirculation'),
            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
            DateTime::make('deletedAt')->sortable()->readOnly(),
            DateTime::make('completedAt')->sortable()->readOnly(),
            BelongsTo::make('owner')->type('employees'),
            HasMany::make('options')->type('proposition-options'),
            HasMany::make('authorExpenses')->type('author-expenses'),
            HasMany::make('productionExpenses')->type('production-expenses'),
            HasMany::make('marketingExpenses')->type('marketing-expenses'),
            HasMany::make('approvalRequests'),
            HasMany::make('editors')->type('employees'),
            BelongsToMany::make('authors'),
            BelongsToMany::make('bookCategories'),
            BelongsToMany::make('bibliotecas'),
            BelongsToMany::make('bookTenders'),
            BelongsToMany::make('bookTypes'),
            BelongsToMany::make('schoolSubjects'),
            BelongsToMany::make('schoolTypes'),
            BelongsToMany::make('documents')->type('files'),
            BelongsToMany::make('authorOtherExpenses')->type('additional-expenses'),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
        ];
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

}
