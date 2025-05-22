<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Contoh Struktur Data Array of Objects
    private function getTasks()
    {
        return session('tasks', [
            ["id" => 1, "tittle" => "Belajar PHP", "status" => "belum"],
            ["id" => 2, "tittle" => "Kerjakan tugas UX", "status" => "selesai"],
        ]);
    }

    // Untuk menyimpan data todo ke dalam session.
    private function saveTasks($tasks)
    {
        session(['tasks' => $tasks]);
    }

    // Untuk menampilkan halaman utama todo list.
    public function index()
    {
        $tasks = $this->getTasks();
        return view('array', compact('tasks'));
    }

    // Untuk menambahkan todo baru dari input form.
    public function store(Request $request)
    {
        $tasks = $this->getTasks();
        $tasks[] = [
            'id' => count($tasks) + 1,
            'tittle' => $request->tittle,
            'status' => 'belum',
        ];
        $this->saveTasks($tasks);
        return redirect('/');
    }

    // Untuk mengubah status todo (dari "belum" menjadi "selesai", atau sebaliknya).
    public function update(Request $request, $id)
    {
        $tasks = $this->getTasks();
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                // Checkbox mengirim 'on' jika dicentang, tidak kirim apapun jika tidak
                $task['status'] = $request->has('status') ? 'selesai' : 'belum';
                break;
            }
        }
        $this->saveTasks($tasks);
        return redirect('/');
    }

    // Untuk Menghapus Todolist nya
    public function delete($id)
    {
        $tasks = array_filter($this->getTasks(), fn($task) => $task['id'] != $id);
        $this->saveTasks(array_values($tasks));
        return redirect('/');
    }
}
