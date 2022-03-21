<?php

namespace Inspirium\Traits;

use Inspirium\Models\Messaging\Thread;

trait HasThread {

    public function thread() {
        return $this->morphOne('Inspirium\Models\Messaging\Thread', 'connection');
    }

    public function assignThread($employees) {
        if (!$this->thread) {
            $t = Thread::create(['title' => $this->name]);
            $t->users()->sync(collect($employees)->pluck('id')->all());
            $this->thread()->save($t);
            $t->load('users');
            foreach($t->users as $employee) {
                $employee->notify(new $this->notification($this));
            }
        }
        else {
            $this->thread->users()->sync(collect($employees)->pluck('id')->all());
            foreach($this->thread->users as $employee) {
                $employee->notify(new $this->notification($this));
            }
        }
    }

    public function assignNewThread() {
        $t = Thread::create(['title' => __(':type: :name', ['type' => get_class($this), 'name' => $this->name])]);
        $t->users()->sync([$this->assignee_id, $this->assigner_id]);
        $this->thread()->save($t);
        $this->assignee->notify(new $this->notification($this));
    }
}
