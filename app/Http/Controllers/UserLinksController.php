<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLinks;
use Illuminate\Support\Facades\Auth;

class UserLinksController extends Controller
{
    public function show() {
        $userId = Auth::id();
        $userLinks = UserLinks::where('userId', $userId)->get();
       
        return view('links.dashboard', $userLinks[0]);
    }

    public function update() {
        $userId = Auth::id();
        $userLinks = UserLinks::where('userId', $userId)->get();
        $linkId = request('shortcut-id');
        $link = request('website');
        $color = request('color');
        $title = request('title');

        $address = "http://";
        if(strpos($link, $address) === false){
            $address .= $link;
            $link = $address;
        }

        $dashLinks = $userLinks[0]->links;
        $dashLinks[$linkId] = $link;
        $dashColors = $userLinks[0]->colors;
        $dashColors[$linkId] = $color;
        $dashTitles = $userLinks[0]->titles;
        $dashTitles[$linkId] = $title;
        $userLinks[0]->links = $dashLinks;
        $userLinks[0]->colors = $dashColors;
        $userLinks[0]->titles = $dashTitles;
        $userLinks[0]->save();
        return view('links.dashboard', $userLinks[0]);
    }

    public function delete() {
        $userId = Auth::id();
        $userLinks = UserLinks::where('userId', $userId)->get();
        $linkId = request('shortcut-id');
        $dashLinks = $userLinks[0]->links;
        $dashColors = $userLinks[0]->colors;
        $dashTitles = $userLinks[0]->titles;
        $dashLinks[$linkId] = 'empty';
        $dashColors[$linkId] = 'blue';
        $dashTitles[$linkId] = 'empty';
        $userLinks[0]->links = $dashLinks;
        $userLinks[0]->colors = $dashColors;
        $userLinks[0]->titles = $dashTitles;
        $userLinks[0]->save();
        return view('links.dashboard', $userLinks[0]);
    }
}
