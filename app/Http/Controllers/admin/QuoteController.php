<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Http\Requests\CreateQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;

class QuoteController extends Controller
{
    protected $_quote;

    public function __construct(Quote $quote)
    {
        $this->_quote = $quote;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quote-panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuoteRequest $rq)
    {
        return $this->_quote->store($rq->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $rq)
    {
        $quote = $this->_quote->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('quote.update', $quote);

        return view('admin.quote.edit',['quote'=>$quote]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuoteRequest $rq)
    {
        $quote = $this->_quote->getById(base64_decode($rq->id))->firstOrFail();

        $this->authorize('quote.update', $quote);

        return $this->updateQuote($rq->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = $this->_quote->getById($id)->firstOrFail();

        $this->authorize('quote.edit', $quote);

        return $this->_quote->destroyQuote();
    }

    public function perform(Request $rq)
    {
      $val = $rq->operabox;
      $id = base64_decode($rq->id);
      

      switch ($val) {
          case 1:
              $this->destroy($id);
              break;
          
          default:
              // code...
              break;
      }
    }
}
