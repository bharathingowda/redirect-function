<?php

			function unshorten_url($url){
							$ch = curl_init();

							curl_setopt($ch, CURLOPT_HEADER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_URL, $url);
							$out = curl_exec($ch);

							$real_url = $url;//default.. (if no redirect)

							if (preg_match("/location: (.*)/i", $out, $redirect))
								$real_url = $redirect[0];

							if (strstr($real_url, "bit.ly"))//the redirect is another shortened url
								$real_url = unshorten_url($real_url);

							return $real_url;
						}					//If form submitted empty
			if (!isset($_POST['submit']))
			{

					$url=array();
	
					echo "no value entered";
			}
			else
			{
										//Retrieve established url array.

					$url=($_POST['url']);

										//Convert user input string into an array.

					$added=explode(',',$_POST['added']);

										//Add to the established array.
				
					
							foreach ($added as $value) 
					{
						echo($value);
						echo(" -------------> ");
						echo(unshorten_url($value));
						echo("\n");
					}
							
					
			
			}

				
					
			

			?>	
				

 


