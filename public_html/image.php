<?php

function SuperPrint($Array)
{
    echo "<pre>";
    print_r($Array);
    echo "</pre>";
}

if($_GET['url'])
{
    $url = parse_url($_GET['url']);
    
    if($url['host'])
    {
        $file = pathinfo($url['path']);
        
        if(in_array(strtolower($file['extension']), array('jpg', 'jpeg', 'png', 'bmp', 'gif', 'tif', 'tiff')))
        {
            // Hash the image URL to save cached versions
            $hash = hash('sha256', $_GET['url']);
            $file = "/tmp/glitch_{$hash}";

            // If this file is already saved
            if(file_exists($file))
            {
                // Get the contents from the temporary file
                $data = file_get_contents("/tmp/glitch_{$hash}");
            }

            // Otherwise, save the file
            else
            {
                $data = file_get_contents($_GET['url']);
                file_put_contents("/tmp/glitch_{$hash}", $data);
            }
                
            $type = mime_content_type($file);
            Header("Content-type: $type");
            
            $length = strlen($data);
            $corruption = rand(3, $length / rand(3, $length / 3));
    
            while($corruption > 0)
            {
                $where = rand(0, $length);
                $data[$where] = rand(0, $length);

                $corruption--;
            }
            
            echo $data;
        }
    }
}

?>
