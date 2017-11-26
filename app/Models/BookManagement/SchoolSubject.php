<?php
/**
 *
 * Filename: SchoolSubject.php
 *
 * User: mbanusic
 * Date: 16/05/2017
 * Time: 15:37
 *
 * Contact: http://mbanusic.com
 * License: GPL-2.0+
 */

namespace Inspirium\Models\BookManagement;


use Illuminate\Database\Eloquent\Model;

/**
 * Inspirium\Models\BookManagement\SchoolSubject
 *
 * @property int $id
 * @property string $name
 * @property string|null $designation
 * @property int|null $parent_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Inspirium\Models\BookManagement\SchoolSubject[] $children
 * @property-read mixed $subjects
 * @property-read \Inspirium\Models\BookManagement\SchoolSubject|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolSubject whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolSubject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolSubject whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Inspirium\Models\BookManagement\SchoolSubject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SchoolSubject extends Model {

    protected $table = 'school_subjects';

    protected $appends = ['subjects'];

	public function books() {
		return $this->morphedByMany('Inspirium\Models\BookManagement\Book', 'connection', 'school_subjects_pivot', 'school_subject_id');
	}

	public function propositions() {
		return $this->morphedByMany('Inspirium\BookProposition\Models\BookProposition', 'connection', 'school_subjects_pivot', 'school_subject_id');
	}

	public function parent() {
		return $this->belongsTo('Inspirium\Models\BookManagement\SchoolSubject');
	}

	public function children() {
		return $this->hasMany('Inspirium\Models\BookManagement\SchoolSubject', 'parent_id');
	}

	public function getSubjectsAttribute() {
		return $this->attributes['groups'] = $this->getRelationValue('children')->keyBy('id');
	}
}
