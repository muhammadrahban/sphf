<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    function getSurveys()
    {
        $surveys = Survey::with('questions.answers')->orderBy('created_at', 'DESC')->get();
        return view('Survey.SurveyList', compact('surveys'));
    }

    function create()
    {
        return view('Survey.surveyUpdateCreate');
    }


    function add(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'name'         => 'required|max:50',
            'subtitle'      => 'required|max:50',
            'fdp'           => 'required|integer',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image_url"] = $this->media(
                $request,
                "survey"
            );
        }
        $survey = Survey::create($validateData);
        // return $request->question;
        foreach ($request->question as $question) {
            $questions = Question::create([
                'survey_id'   =>  $survey->id,
                'question_text'   =>  $question['text'],
                'question_type'   =>  'text',
            ]);
            foreach ($question['answer'] as $answer) {
                Answer::create([
                    'question_id' => $questions->id,
                    'answer_text' => $answer,
                ]);
            }
        }

        return redirect(route('survey.list'))->with('message', 'survey created successfully');
    }

    function edit(Survey $survey)
    {
        // return $survey;
        $survey->load('questions.answers');
        return view('Survey.surveyUpdateCreate', compact('survey'));
    }

    public function update(Request $request, survey $survey)
    {
        // return $survey;
        $validateData = $request->validate([
            'name'         => 'required|max:50',
            'subtitle'      => 'required|max:50',
            'fdp'           => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image_url"] = $this->media($request, "survey");
        }
        $survey->update($validateData);
        $questionIds =  $survey->questions->pluck('id');
        Answer::whereIn('question_id', $questionIds)->delete();
        $survey->questions()->delete();
        foreach ($request->question as $question) {
            $questions = Question::create([
                'survey_id'   =>  $survey->id,
                'question_text'   =>  $question['text'],
                'question_type'   =>  'text',
            ]);
            foreach ($question['answer'] as $answer) {
                Answer::create([
                    'question_id' => $questions->id,
                    'answer_text' => $answer,
                ]);
            }
        }
        return redirect(route('survey.list'))->with('message', 'survey updated successfully');
    }

    function delete(survey $survey)
    {
        $survey->delete();
        return redirect(route('survey.list'))->with('message', 'survey deleted saccessfully');
    }
}
