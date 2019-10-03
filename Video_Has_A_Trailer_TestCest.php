<?php 

class Video_Has_A_Trailer_TestCest
{
    public function _before(AcceptanceTester $I)
    {   
		$I->amOnPage('/');	
    }

    public function checkVidHasTrailer(AcceptanceTester $I)
    {                 
        $I->fillField('form input[type=text]', 'Nice job');
		$I->click(['xpath'=> '//*[@id="search-icon-legacy"]']);
		$I->waitForJS(strval('return document.readyState')) == 'completed';
		$I->see('nice job', '//*[@id="video-title"]');				
		$videos = $I->grabMultiple('//*[@class="style-scope yt-img-shadow"]');
		echo strval(count($videos));
		$I->wait(1);
		echo strval(count($videos));		
		for ($x = 1; $x <= count($videos); $x++) {			
			   $I->moveMouseOver("/descendant::img[contains(@id,'img') or contains(@id,'thumbnail')][position()=$x]");						
				  try {$I->seeElementInDom('//div[@id="mouseover-overlay"]//img[@id="thumbnail" and contains(@src,"https://i.ytimg.com/an_webp")]');
			           echo "FYI: Trailer";
					   }			  
			      catch(Exception $e)
			      {echo "No any trailer";}			 
			    			 $I->wait(2);		
        }  
	}		
}
