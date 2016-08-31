<?php
    // Defining the basic scraping function
    function scrape_between($data, $start, $end){
        $data = stristr($data, $start); // Stripping all data from before $start
        $data = stristr($data, "Chittagong </a>");
        //$data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "alt=\"icon\"");
       // $data = stristr($data, "</td>");
        $ctg='';
        $ctgmax='';
        $ctgmin='';
        $ctgrain='';
        $flag=0;
        $flag1=0;
        $lock=0;
        $char='l';
        for( $i = 0 ;  ; $i++ ) {
        	$char=substr( $data, $i, 1 ); 
        	

        	if($char==='<'){
        	
        		if($flag1!=14){
        			$flag1++;
        		}
        		else{break;}
        		
        	}
        	if(($flag==4 && $flag1==3) || ($flag==7 && $flag1==6) || ($flag==11 && $flag1==10) || ($flag==15 && $flag1==14)){
        		$lock=1;
        	}
        	else{$lock=0;}
        	if($flag==4 && $lock==1){
        		$ctg.=$char;
        		
        	}
        	if($char==='>'){
        		$flag++;
        	}
        	if($flag==7 && $lock==1){
        		$ctgmin.=$char;
        		
        	}
        	if($flag==11 && $lock==1){
        		$ctgmax.=$char;
        		
        	}
        	if($flag==15 && $lock==1){
        		$ctgrain.=$char;
        		
        	}
        	
        	//echo $ctg;
        	//echo $i;
        	
        }
        // echo $ctgrain;
        // echo "\n";
        // echo $ctgmax;
        
        require_once('config.php');         

// Database connection                                   
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']);

		$return=false;
	if ($stmt = $mysqli->prepare("UPDATE PLACE  SET weather= ? , max_temp= ? , min_temp= ? , rain_chance= ? where division='Chittagong'")) {

		$stmt->bind_param("ssss", $ctg, $ctgmax, $ctgmin, $ctgrain);
		$return = $stmt->execute();
		$stmt->close();
	} 
	$data = stristr($data, "Coxs Bazar</a>");
        //$data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "alt=\"icon\"");
       // $data = stristr($data, "</td>");
        $cox='';
        $coxmax='';
        $coxmin='';
        $coxrain='';
        $flag=0;
        $flag1=0;
        $lock=0;
        $char='';
        for( $i = 0 ;  ; $i++ ) {
        	$char=substr( $data, $i, 1 ); 
        	

        	if($char==='<'){
        	
        		if($flag1!=14){
        			$flag1++;
        		}
        		else{break;}
        		
        	}
        	if(($flag==4 && $flag1==3) || ($flag==7 && $flag1==6) || ($flag==11 && $flag1==10) || ($flag==15 && $flag1==14)){
        		$lock=1;
        	}
        	else{$lock=0;}
        	if($flag==4 && $lock==1){
        		$cox.=$char;
        		
        	}
        	if($char==='>'){
        		$flag++;
        	}
        	if($flag==7 && $lock==1){
        		$coxmin.=$char;
        		
        	}
        	if($flag==11 && $lock==1){
        		$coxmax.=$char;
        		
        	}
        	if($flag==15 && $lock==1){
        		$coxrain.=$char;
        		
        	}
        	
        	//echo $cox;
        	//echo $i;
        	
        }
        // echo $coxrain;
        // echo "\n";
        // echo $coxmax;
        

		$return=false;
	if ($stmt = $mysqli->prepare("UPDATE PLACE  SET weather= ? , max_temp= ? , min_temp= ? , rain_chance= ? where division='Coxs Bazar'")) {

		$stmt->bind_param("ssss", $cox, $coxmax, $coxmin, $coxrain);
		$return = $stmt->execute();
		$stmt->close();
	} 
		$data = stristr($data, "Dhaka</a>");
        //$data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "alt=\"icon\"");
       // $data = stristr($data, "</td>");
        $dhk='';
        $dhkmax='';
        $dhkmin='';
        $dhkrain='';
        $flag=0;
        $flag1=0;
        $lock=0;
        $char='';
        for( $i = 0 ;  ; $i++ ) {
                $char=substr( $data, $i, 1 ); 
                

                if($char==='<'){
                
                        if($flag1!=14){
                                $flag1++;
                        }
                        else{break;}
                        
                }
                if(($flag==4 && $flag1==3) || ($flag==7 && $flag1==6) || ($flag==11 && $flag1==10) || ($flag==15 && $flag1==14)){
                        $lock=1;
                }
                else{$lock=0;}
                if($flag==4 && $lock==1){
                        $dhk.=$char;
                        
                }
                if($char==='>'){
                        $flag++;
                }
                if($flag==7 && $lock==1){
                        $dhkmin.=$char;
                        
                }
                if($flag==11 && $lock==1){
                        $dhkmax.=$char;
                        
                }
                if($flag==15 && $lock==1){
                        $dhkrain.=$char;
                        
                }
                
                //echo $dhk;
                //echo $i;
                
        }
        // echo $dhkrain;
        // echo "\n";
        // echo $dhkmax;
        

        $return=false;
        if ($stmt = $mysqli->prepare("UPDATE PLACE  SET weather= ? , max_temp= ? , min_temp= ? , rain_chance= ? where division='Dhaka'")) {

                $stmt->bind_param("ssss", $dhk, $dhkmax, $dhkmin, $dhkrain);
                $return = $stmt->execute();
                $stmt->close();
        } 

			$data = stristr($data, "Khulna</a>");
        //$data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "alt=\"icon\"");
       // $data = stristr($data, "</td>");
        $khl='';
        $khlmax='';
        $khlmin='';
        $khlrain='';
        $flag=0;
        $flag1=0;
        $lock=0;
        $char='';
        for( $i = 0 ;  ; $i++ ) {
                $char=substr( $data, $i, 1 ); 
                

                if($char==='<'){
                
                        if($flag1!=14){
                                $flag1++;
                        }
                        else{break;}
                        
                }
                if(($flag==4 && $flag1==3) || ($flag==7 && $flag1==6) || ($flag==11 && $flag1==10) || ($flag==15 && $flag1==14)){
                        $lock=1;
                }
                else{$lock=0;}
                if($flag==4 && $lock==1){
                        $khl.=$char;
                        
                }
                if($char==='>'){
                        $flag++;
                }
                if($flag==7 && $lock==1){
                        $khlmin.=$char;
                        
                }
                if($flag==11 && $lock==1){
                        $khlmax.=$char;
                        
                }
                if($flag==15 && $lock==1){
                        $khlrain.=$char;
                        
                }
                
                //echo $khl;
                //echo $i;
                
        }
        // echo $khlrain;
        // echo "\n";
        // echo $khlmax;
        

        $return=false;
        if ($stmt = $mysqli->prepare("UPDATE PLACE  SET weather= ? , max_temp= ? , min_temp= ? , rain_chance= ? where division='Khulna'")) {

                $stmt->bind_param("ssss", $khl, $khlmax, $khlmin, $khlrain);
                $return = $stmt->execute();
                $stmt->close();
        } 

			$data = stristr($data, "Rajshahi</a>");
        //$data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "alt=\"icon\"");
       // $data = stristr($data, "</td>");
        $rjs='';
        $rjsmax='';
        $rjsmin='';
        $rjsrain='';
        $flag=0;
        $flag1=0;
        $lock=0;
        $char='';
        for( $i = 0 ;  ; $i++ ) {
                $char=substr( $data, $i, 1 ); 
                

                if($char==='<'){
                
                        if($flag1!=14){
                                $flag1++;
                        }
                        else{break;}
                        
                }
                if(($flag==4 && $flag1==3) || ($flag==7 && $flag1==6) || ($flag==11 && $flag1==10) || ($flag==15 && $flag1==14)){
                        $lock=1;
                }
                else{$lock=0;}
                if($flag==4 && $lock==1){
                        $rjs.=$char;
                        
                }
                if($char==='>'){
                        $flag++;
                }
                if($flag==7 && $lock==1){
                        $rjsmin.=$char;
                        
                }
                if($flag==11 && $lock==1){
                        $rjsmax.=$char;
                        
                }
                if($flag==15 && $lock==1){
                        $rjsrain.=$char;
                        
                }
                
                //echo $rjs;
                //echo $i;
                
        }
        // echo $rjsrain;
        // echo "\n";
        // echo $rjsmax;
        

                $return=false;
        if ($stmt = $mysqli->prepare("UPDATE PLACE  SET weather= ? , max_temp= ? , min_temp= ? , rain_chance= ? where division='Rajshahi'")) {

                $stmt->bind_param("ssss", $rjs, $rjsmax, $rjsmin, $rjsrain);
                $return = $stmt->execute();
                $stmt->close();
        }  


			$data = stristr($data, "Sylhet</a>");
        //$data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "<td align=\"center\" width=");
        $data = stristr($data, "alt=\"icon\"");
       // $data = stristr($data, "</td>");
         $syl='';
        $sylmax='';
        $sylmin='';
        $sylrain='';
        $flag=0;
        $flag1=0;
        $lock=0;
        $char='';
        for( $i = 0 ;  ; $i++ ) {
                $char=substr( $data, $i, 1 ); 
                

                if($char==='<'){
                
                        if($flag1!=14){
                                $flag1++;
                        }
                        else{break;}
                        
                }
                if(($flag==4 && $flag1==3) || ($flag==7 && $flag1==6) || ($flag==11 && $flag1==10) || ($flag==15 && $flag1==14)){
                        $lock=1;
                }
                else{$lock=0;}
                if($flag==4 && $lock==1){
                        $syl.=$char;
                        
                }
                if($char==='>'){
                        $flag++;
                }
                if($flag==7 && $lock==1){
                        $sylmin.=$char;
                        
                }
                if($flag==11 && $lock==1){
                        $sylmax.=$char;
                        
                }
                if($flag==15 && $lock==1){
                        $sylrain.=$char;
                        
                }
                
                //echo $syl;
                //echo $i;
                
        }
        // echo $sylrain;
        // echo "\n";
        // echo $sylmax;
        

                $return=false;
        if ($stmt = $mysqli->prepare("UPDATE PLACE  SET weather= ? , max_temp= ? , min_temp= ? , rain_chance= ? where division='Sylhet'")) {

                $stmt->bind_param("ssss", $syl, $sylmax, $sylmin, $sylrain);
                $return = $stmt->execute();
                $stmt->close();
        } 


        //echo $i;
        $data = substr($data, strlen($start));  // Stripping $start
        $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
        $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
        return $data;   // Returning the scraped data from the function
    }




        function curl($url) {
        // Assigning cURL options to an array
        $options = Array(
            CURLOPT_RETURNTRANSFER => TRUE,  // Setting cURL's option to return the webpage data
            CURLOPT_FOLLOWLOCATION => TRUE,  // Setting cURL to follow 'location' HTTP headers
            CURLOPT_AUTOREFERER => TRUE, // Automatically set the referer where following 'location' HTTP headers
            CURLOPT_CONNECTTIMEOUT => 120,   // Setting the amount of time (in seconds) before the request times out
            CURLOPT_TIMEOUT => 120,  // Setting the maximum amount of time for cURL to execute queries
            CURLOPT_MAXREDIRS => 10, // Setting the maximum number of redirections to follow
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8",  // Setting the useragent
            CURLOPT_URL => $url, // Setting cURL's URL option with the $url variable passed into the function
        );
         
        $ch = curl_init();  // Initialising cURL 
        curl_setopt_array($ch, $options);   // Setting cURL's options using the previously assigned array data in $options
        $data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
        curl_close($ch);    // Closing cURL 
        return $data;   // Returning the data from the function 
    }

   $scraped_page = curl("http://www.weatherzone.com.au/world/asia/bangladesh/chittagong-");    // Downloading IMDB home //page to variable $scraped_page
   $scraped_data = scrape_between($scraped_page, "Bangladesh Weather Forecasts for","</table>");   // Scraping downloaded dara in $scraped_page for content between <title> and </title> tags
?>