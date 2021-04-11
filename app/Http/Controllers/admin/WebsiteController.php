<?php

namespace App\Http\Controllers\admin;

use App\Models\Website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WebsiteUpdateRequest;
use App\Http\Requests\WesiteUpdateFaviconRequest;
use App\Http\Requests\WesiteUpdateLogoRequest;
use App\Http\Requests\WesiteUpdateShortcutRequest;
use App\Services\UploadFileService;

class WebsiteController extends Controller
{
    protected $_site;

    public function __construct(Website $site, UploadFileService $uploadFileService)
    {
        $this->_site = $site;

        $this->_uploadFileService = $uploadFileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $site = $this->_site->getSite();

        $this->authorize('website.update', $site);

        return view('admin.site.edit', ['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteUpdateRequest $rq)
    {
        $site = $this->_site->getSite();

        $this->authorize('website.update', $site);

        $this->_site->updateSite($rq->all());

        return redirect()->back();
    }

    public function updateLogo(WesiteUpdateLogoRequest $rq)
    {
        $b64_img = $this->_uploadFileService->getBase64Image($rq->file('logo'));

        $this->_site->updateSite([
            'logo_photo_path' => $b64_img,
        ]);

        return redirect()->back();
    }

    public function updateShortcut(WesiteUpdateShortcutRequest $rq)
    {
        $b64_img = $this->_uploadFileService->getBase64Image($rq->file('shortcut'));

        $this->_site->updateSite([
            'shortcut_photo_path' => $b64_img,
        ]);

        return redirect()->back();
    }

    public function updateFavicon(WesiteUpdateFaviconRequest $rq)
    {
        $b64_img = $this->_uploadFileService->getBase64Image($rq->file('favicon'));

        $this->_site->updateSite([
            'favicon_photo_path' => $b64_img,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
