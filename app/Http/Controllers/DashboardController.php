<?php

namespace App\Http\Controllers;

use App\Models\Clocked;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $userscount = User::count();
        $taskscount = Task::count();
        $timescount = Clocked::count();
        $onlineCount = User::where('online_status', true)->count();
        $todoCount = Task::where('status', 'to-do')->count();
        $taskProgressCount = Task::where('status', 'in-progress')->count();
        $taskCompleted = Task::where('status', 'completed')->count();
        $users= User::all();



        // $allData = User::join('tasks','user.id',''=','tasks.user_id')->
        //                  join('clocked_times','user.id','=','clocked_times.user_id')->
        //                  select('users.*','tasks.*','clocked_times.*')
        // ->get();

        return view('dashboard', compact('users','userscount', 'taskscount', 'timescount', 'onlineCount', 'todoCount', 'taskProgressCount', 'taskCompleted'));
    }
}
