<?php

namespace App\Policies;

use App\Models\Process;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProcessPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function enrolled(User $user, Process $process)
    {
        return $process->proveedores->contains($user->id);
    }

    public function verifica_doble(User $user, Process $process)
    {
        if ($process->proveedores->contains($user->id)) {
            return false;
        }else {
            return true;
        }
    }

    public function published(?User $user, Process $process)
    {
        if ($process->status != 1 && $process->status != 5 && $process->status != 6) {
            return true;
        } else {
            return false;
        }
    }

    public function mod_processes(User $user, Process $process)
    {
        if ($process->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
        
    }

    public function revision(User $user, Process $process)
    {
        if ($process->status == 5) {
            return true;
        } else {
            return false;
        }
        
    }
}