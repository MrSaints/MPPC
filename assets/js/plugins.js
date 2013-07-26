// Avoid `console` errors in browsers that lack a console.
!function(){for(var a,b=function(){},c=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"],d=c.length,e=window.console=window.console||{};d--;)a=c[d],e[a]||(e[a]=b)}();

/*
 * tweetable 1.7.1 - jQuery twitter feed plugin
 *
 * Copyright (c) 2009 Philip Beel (http://www.theodin.co.uk/)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * With modifications from Philipp Robbel (http://www.robbel.com/) & Patrick DW (stackoverflow)
 *
 * Revision: $Id: jquery.tweetable.js 2013-06-16 $ 
 *
 */
(function($){jQuery.fn.tweetable=function(opts){opts=$.extend({},$.fn.tweetable.options,opts);return this.each(function(){var act=jQuery(this),tweetList=jQuery('<ul class="unstyled inline tweetList">')[opts.position.toLowerCase()+"To"](act),shortMonths=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],api="http://api.getmytweets.co.uk/?screenname=",limitcount="&limit=",twitterError,tweetMonth,tweetMonthInt,iterate,element;jQuery.getJSON(api+opts.username+limitcount+opts.limit,act,function(data){twitterError=
data&&data.error||null;if(twitterError){tweetList.append('<li class="tweet_content item"><p class="tweet_link">'+opts.failed+"</p></li>");return}jQuery.each(data.tweets,function(i,tweet){if(i>=opts.limit)return;tweetList.append('<li class="tweet_content_'+i+'"><p class="tweet_link_'+i+'">'+tweet.response.replace(/#(.*?)(\s|$)/g,'<span class="hash">#$1 </span>').replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,'<a href="$&">$&</a> ').replace(/@(.*?)(\s|\(|\)|$)/g,
'<a href="http://twitter.com/$1">@$1 </a>$2').replace(/:">/, ' ">').replace(/: <\/a>/, '</a>:')+"</p></li>");if(opts.time===true){for(iterate=0;iterate<=12;iterate++)if(shortMonths[iterate]===tweet.tweet_date.substr(4,3)){tweetMonthInt=iterate+1;tweetMonth=tweetMonthInt<10?"0"+tweetMonthInt:tweetMonthInt}var iso8601=tweet.tweet_date.substr(26,4)+"-"+tweetMonth+"-"+tweet.tweet_date.substr(8,2)+"T"+tweet.tweet_date.substr(11,8)+"Z";jQuery(".tweet_link_"+i).append('<p class="timestamp"><'+(opts.html5?'time datetime="'+iso8601+'"':"small")+"> "+tweet.tweet_date.substr(8,
2)+"/"+tweetMonth+"/"+tweet.tweet_date.substr(26,4)+", "+tweet.tweet_date.substr(11,5)+"</"+(opts.html5?"time":"small")+"></p>")}});if(opts.rotate===true){var listItem=tweetList.find("li"),listLength=listItem.length||null,current=0,timeout=opts.speed;if(!listLength)return;function rotateTweets(){listItem.eq(current++).fadeOut(400,function(){current=current===listLength?0:current;listItem.eq(current).fadeIn(400)})}listItem.slice(1).hide();setInterval(rotateTweets,timeout)}opts.onComplete(tweetList)})})};
$.fn.tweetable.options={limit:5,username:"philipbeel",time:false,rotate:false,speed:5E3,replies:false,position:"append",failed:"No tweets available",html5:false,retweets:false,onComplete:function($ul){}}})(jQuery);

/**
 * Timeago is a jQuery plugin that makes it easy to support automatically
 * updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago").
 *
 * @name timeago
 * @version 1.3.0
 * @requires jQuery v1.2.3+
 * @author Ryan McGeary
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 *
 * For usage and examples, visit:
 * http://timeago.yarp.com/
 *
 * Copyright (c) 2008-2013, Ryan McGeary (ryan -[at]- mcgeary [*dot*] org)
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function d(){var c=e(this),d=b.settings;return isNaN(c.datetime)||(0==d.cutoff||g(c.datetime)<d.cutoff)&&a(this).text(f(c.datetime)),this}function e(c){if(c=a(c),!c.data("timeago")){c.data("timeago",{datetime:b.datetime(c)});var d=a.trim(c.text());b.settings.localeTitle?c.attr("title",c.data("timeago").datetime.toLocaleString()):!(d.length>0)||b.isTime(c)&&c.attr("title")||c.attr("title",d)}return c.data("timeago")}function f(a){return b.inWords(g(a))}function g(a){return(new Date).getTime()-a.getTime()}a.timeago=function(b){return b instanceof Date?f(b):"string"==typeof b?f(a.timeago.parse(b)):"number"==typeof b?f(new Date(b)):f(a.timeago.datetime(b))};var b=a.timeago;a.extend(a.timeago,{settings:{refreshMillis:6e4,allowFuture:!1,localeTitle:!1,cutoff:0,strings:{prefixAgo:null,prefixFromNow:null,suffixAgo:"ago",suffixFromNow:"from now",seconds:"less than a minute",minute:"about a minute",minutes:"%d minutes",hour:"about an hour",hours:"about %d hours",day:"a day",days:"%d days",month:"about a month",months:"%d months",year:"about a year",years:"%d years",wordSeparator:" ",numbers:[]}},inWords:function(b){function k(d,e){var f=a.isFunction(d)?d(e,b):d,g=c.numbers&&c.numbers[e]||e;return f.replace(/%d/i,g)}var c=this.settings.strings,d=c.prefixAgo,e=c.suffixAgo;this.settings.allowFuture&&0>b&&(d=c.prefixFromNow,e=c.suffixFromNow);var f=Math.abs(b)/1e3,g=f/60,h=g/60,i=h/24,j=i/365,l=45>f&&k(c.seconds,Math.round(f))||90>f&&k(c.minute,1)||45>g&&k(c.minutes,Math.round(g))||90>g&&k(c.hour,1)||24>h&&k(c.hours,Math.round(h))||42>h&&k(c.day,1)||30>i&&k(c.days,Math.round(i))||45>i&&k(c.month,1)||365>i&&k(c.months,Math.round(i/30))||1.5>j&&k(c.year,1)||k(c.years,Math.round(j)),m=c.wordSeparator||"";return void 0===c.wordSeparator&&(m=" "),a.trim([d,l,e].join(m))},parse:function(b){var c=a.trim(b);return c=c.replace(/\.\d+/,""),c=c.replace(/-/,"/").replace(/-/,"/"),c=c.replace(/T/," ").replace(/Z/," UTC"),c=c.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2"),new Date(c)},datetime:function(c){var d=b.isTime(c)?a(c).attr("datetime"):a(c).attr("title");return b.parse(d)},isTime:function(b){return"time"===a(b).get(0).tagName.toLowerCase()}});var c={init:function(){var c=a.proxy(d,this);c();var e=b.settings;e.refreshMillis>0&&setInterval(c,e.refreshMillis)},update:function(c){a(this).data("timeago",{datetime:b.parse(c)}),d.apply(this)},updateFromDOM:function(){a(this).data("timeago",{datetime:b.parse(b.isTime(this)?a(this).attr("datetime"):a(this).attr("title"))}),d.apply(this)}};a.fn.timeago=function(a,b){var d=a?c[a]:c.init;if(!d)throw new Error("Unknown function name '"+a+"' for timeago");return this.each(function(){d.call(this,b)}),this},document.createElement("abbr"),document.createElement("time")}); 
