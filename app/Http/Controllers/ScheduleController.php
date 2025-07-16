<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'Admin');
        })->get();  

        return view('schedule.index', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Carbon::setLocale('id');

            // Ubah string "Rabu, 9 Juli 2025" menjadi format tanggal
            $originalDate = $request->schedule_date;
            $bulanIndonesia = [
                'Januari' => 'January', 'Februari' => 'February', 'Maret' => 'March',
                'April' => 'April', 'Mei' => 'May', 'Juni' => 'June',
                'Juli' => 'July', 'Agustus' => 'August', 'September' => 'September',
                'Oktober' => 'October', 'November' => 'November', 'Desember' => 'December',
            ];
            $cleanedDate = preg_replace('/^[A-Za-z]+,\s*/', '', $originalDate);
            foreach ($bulanIndonesia as $indo => $eng) {
                if (strpos($cleanedDate, $indo) !== false) {
                    $cleanedDate = str_replace($indo, $eng, $cleanedDate);
                    break;
                }
            }
            $formattedDate = Carbon::createFromFormat('d F Y', $cleanedDate)->format('Y-m-d');
          
            Schedule::create([
                'schedule_date' => $formattedDate,
                'schedule_time' => $request->schedule_time,
                'student_id'       => Auth::id(),
                'user_id'       => $request->user_id,
                'description'    => $request->ketarangan,
            ]);
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Jadwal berhasil disimpan!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            Log::error('Gagal menyimpan jadwal: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jadwal.');
        }
    }

    public function getSchedules()
    {
        $schedules = Schedule::with(['student', 'teacher'])->where('student_id', Auth::id())->get();
        $events = $schedules->map(function ($schedule) {
            return [
                'title' => 'Konseling: ' . $schedule->teacher?->name,
                'start' => $schedule->schedule_date,
                'extendedProps' => [
                    'siswa' => $schedule->student?->name,
                    'guru' => $schedule->teacher->name ?? '-',
                    'schedule_time' => $schedule->schedule_time,
                    'deskripsi' => $schedule->description ?? '-'
                ]
            ];
        });

        return response()->json($events);
    }
}

