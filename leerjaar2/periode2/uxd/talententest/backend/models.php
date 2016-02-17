<?php
    use Illuminate\Database\Eloquent\Model as Model;
    use Illuminate\Database\Capsule\Manager as Capsule;
    use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

    class User extends Model {
        protected $table = 'users';
        protected $primaryKey = 'id';
        protected $hidden = array('password', 'updated_at', 'schooladvice_id');

        public function scopeIsMale($q) {
            return $q->where('gender', '=', 'm');
        }

        public function scopeIsFemale($q) {
            return $q->where('gender', '=', 'f');
        }

        public function talents() {
            return $this->belongsToMany('Talent')->withPivot('score', 'picked');
        }

        public function token() {
            return $this->hasOne('Token');
        }

        public function skills() {
            return $this->belongsToMany('Skill');
        }

        public function occupations() {
            return $this->belongsToMany('Occupation');
        }

        public function mindmap() {
            return $this->hasOne('Mindmap');
        }

        public function educationLevel() {
            return $this->belongsTo('EducationLevel');
        }

        public function school() {
            return $this->belongsTo('School');
        }

    }

    class Token extends Model {

        protected $table = 'tokens';
        protected $primaryKey = 'id';
        protected $hidden = array('user_id', 'created_at', 'updated_at', 'id');

        public function user() {
            return $this->belongsTo('User');
        }

        public function generateToken() {
            $this->key = bin2hex(openssl_random_pseudo_bytes(16));
        }

        public function isValid() {
            return $this->updated_at > date('Y-m-d H:i:s', strtotime('-60 minute'));
        }

    }

    class TalentUser extends Model {
        protected $table = 'talent_user';
        protected $primaryKey = 'id';
        protected $hidden = array('talent_id', 'user_id');


        public function user() {
            return $this->belongsTo('User');
        }

        public function talent() {
            return $this->belongsTo('Talent');
        }

        public function scopeIsPicked($q) {
            return $q->where('picked', '=', 1);
        }
    }

    class EducationLevel extends Model {
        protected $table = 'education_levels';
        protected $primaryKey = 'id';
        protected $hidden = array('is_schooladvice');

        public function scopeSchoolAdvice($q) {
            return $q->where('is_schooladvice', '=', 1);
        }

        public function scopeNoSchoolAdvice($q) {
            return $q->where('is_schooladvice', '=', 0);
        }

        public function users() {
            return $this->hasMany('user');
        }

    }

    class Talent extends Model {
        protected $table = 'talents';
        protected $primaryKey = 'id';

        public function questions() {
            return $this->hasMany('Question', 'talent_id', 'id');
        }

        public function users() {
            return $this->belongsToMany('User');
        }

        public function pickedByUsers() {
            return $this->users()->wherePivot('picked', 1);
        }

    }

    class Question extends Model {
        protected $table = 'questions';
        protected $primaryKey = 'id';
        protected $hidden = array('talent_id');
        public $timestamps = false;
    }

    class Skill extends Model {
        protected $table = 'skills';
        protected $primaryKey = 'id';
        public $timestamps = false;

        public function users() {
            return $this->belongsToMany('User');
        }
    }

    class SkillUser extends Model {
        protected $table = 'skill_user';
        protected $primaryKey = 'id';

        public function user() {
            return $this->belongsTo('User');
        }

        public function skill() {
            return $this->belongsTo('Skill');
        }
    }

    class Occupation extends Model {
        protected $table = 'occupations';
        protected $primaryKey = 'id';

        public function educationLevel() {
            return $this->belongsTo('educationLevel');
        }

        public function talent() {
            return $this->belongsTo('Talent');
        }
    }

    class OccupationUser extends Model {
        protected $table = 'occupation_user';
        protected $primaryKey = 'id';

        public function user() {
            return $this->belongsTo('User');
        }

        public function occupation() {
            return $this->belongsTo('Occupation');
        }
    }

    class Mindmap extends Model {
        protected $table = 'mindmap';
        protected $primaryKey = 'id';

        public function user() {
            return $this->belongsTo('User');
        }
    }

    class School extends Model {
        protected $table = 'schools';
        protected $primaryKey = 'id';
        public $timestamps = false;

        public function user() {
            return $this->hasMany('User');
        }
    }
?>
