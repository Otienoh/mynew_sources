<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedsController extends Controller
{

    /** Get interest pulling from different sources if connected via API
     *  Improvements have caching mechanism and use tools like Redis
     *  Fetch news based on Geo-location, Time, Region and Someones browsing history
     *
     * @param $topic
     * @return string
     */
    public function getInterests($topic)
    {
//        Get the topic from the interest button on the homepage by default get Africa On the move content
//        To bad Hivisasa.com does not have a RSS feed

        switch ($topic){
            case 'news':
                $feed = 'http://www.standardmedia.co.ke/rss/kenya.php';
                break;
            case 'politics':
                $feed = 'http://www.standardmedia.co.ke/rss/politics.php';
                break;
            case 'sports':
                $feed = 'http://www.standardmedia.co.ke/rss/sports.php';
                break;
            case 'business':
                $feed = 'http://www.standardmedia.co.ke/rss/business.php';
                break;
            case 'kenya':
                $feed = 'http://allafrica.com/tools/headlines/rdf/kenya/headlines.rdf';
                break;
            case 'uganda':
                $feed = 'http://allafrica.com/tools/headlines/rdf/uganda/headlines.rdf';
                break;
            case 'tanzania':
                $feed = 'http://allafrica.com/tools/headlines/rdf/tanzania/headlines.rdf';
                break;
//                Redirects to homepage showing all links (or most of the links)
            default:
                return redirect('/');
        }

//        Returns the fetchSite passing the feed for specific intrests
        return $this->fetchSite($feed);
    }

    public function fetchSite($link)
    {
        $feed = \Feeds::make($link, true);
        $title = $feed->get_title();
        $permalink = $feed->get_permalink();
        $items = $feed->get_items();

        return view('feed', compact('title', 'permalink', 'items'));
    }

    public function fetchSites()
    {
        $feed = \Feeds::make(['http://bdafrica.com',
            'http://www.standardmedia.co.ke/rss/kenya.php',
            'http://allafrica.com/tools/headlines/rdf/onthemove/headlines.rdf'
        ], 9, true); // if RSS Feed has invalid mime types, force to read
//        $feed = \Feeds::make('http://feeds.bbci.co.uk/news/rss.xml?edition=uk', true);
        $title = $feed->get_title();
        $permalink = $feed->get_permalink();
        $items = $feed->get_items();

        return view('feed', compact('title', 'permalink', 'items'));
    }


}
