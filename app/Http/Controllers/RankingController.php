<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Ranking;
use Auth;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rankings = Ranking::getMyAllRanking();
        // return view('ranking.index', [
        //     'rankings' => $rankings,
        // ]);
        try {
            $rankings = DB::table('rankings')->get();
        } catch(\Exception $e) {
            return $this->resConversionJson($rankings, $e->getCode());
        }
            return $this->resConversionJson($rankings);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ranking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | max:191',
            'point' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('ranking.create')
            ->withInput()
            ->withErrors($validator);
        }
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $result = Ranking::create($data);
        return redirect()->route('ranking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ranking = Ranking::find($id);
        return view('ranking.show', ['ranking' => $ranking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $ranking = Ranking::find($id);
       return view('ranking.edit', ['ranking' => $ranking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required | max:191',
            'point' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
            ->route('ranking.edit', $id)
            ->withInput()
            ->withErrors($validator);
        }

        $result = Ranking::find($id)->update($request->all());
        return redirect()->route('ranking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Ranking::find($id)->delete();
        return redirect()->route('ranking.index');
    }

    public function api()
    {
        try {
            $rankings = DB::table('rankings')->get();
        } catch(\Exception $e) {
            return $this->resConversionJson($rankings, $e->getCode());
        }
            return $this->resConversionJson($rankings);
    }

    private function resConversionJson($rankings, $statusCode = 200)
    {
        if (empty($statusCode) || $statusCode < 100 || $statusCode >= 600) {
            $statusCode = 500;
        }
            return response()->json($rankings);
            return view('ranking.api', [
                'rankings' => $rankings,
            ]);
            
    }
    }

