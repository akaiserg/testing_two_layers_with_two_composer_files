define({
  "name": "API documentation   Test system ",
  "version": "0.1.0",
  "description": "apidoc for the Test project",
  "title": "Test project",
  "url": "http://localhost:8085/xampp/xampp/GitHub/simpleProject/api/public",
  "header": {
    "title": "Test project",
    "content": "<h1>Introduction</h1>\n<p>To get this file is needed to have node and apidoc installed.</p>\n<ul>\n<li><a href=\"http://apidocjs.com/\">Apidoc </a></li>\n</ul>\n"
  },
  "footer": {
    "title": "Help",
    "content": "<h1>Help</h1>\n<pre><code class=\"language-json\">In order to consume the APi, it is needed to install [unirest](http://unirest.io/php.html)\n\n\t{\n\t\t&quot;require-dev&quot;: {\n\t\t\t&quot;mashape/unirest-php&quot;: &quot;2.*&quot;\n\t\t}\n\t}\n</code></pre>\n<p>Example:</p>\n<pre><code class=\"language-php\">$headers = array(&quot;Accept&quot; =&gt; &quot;application/json&quot;,&quot;Content-Type&quot;=&gt;&quot;application/json&quot;);\n\n$aInfo= array();\n$aInfo[&quot;address&quot;]=&quot;address&quot;;\n$aInfo[&quot;age&quot;]=&quot;45&quot;;\n$aInfo[&quot;lastName&quot;]=&quot;last name&quot;;\n$aInfo[&quot;name&quot;]= &quot;name&quot;;\n$aFinal[&quot;data&quot;]=$aInfo;\n$body= json_encode($aFinal);\n$response = Unirest\\Request::post(URL.&quot;createPerson&quot;, $headers, $body);\necho &quot;&lt;pre&gt;&quot;;\necho $response-&gt;code.&quot;&lt;br&gt;&quot;;        // HTTP Status code\n//print_r($response-&gt;headers);     // Headers\nprint_r($response-&gt;body);        // Parsed body\necho $response-&gt;body-&gt;state.&quot;&lt;br&gt;&quot;;\necho $response-&gt;body-&gt;data-&gt;key.&quot;&lt;br&gt;&quot;;\necho $response-&gt;raw_body.&quot;&lt;br&gt;&quot;;\nprint_r(json_decode($response-&gt;raw_body,true));    // Unparsed body\n\n</code></pre>\n"
  },
  "template": {
    "withCompare": false,
    "withGenerator": false
  },
  "sampleUrl": false,
  "apidoc": "0.2.0",
  "generator": {
    "name": "apidoc",
    "time": "2016-04-25T19:32:31.527Z",
    "url": "http://apidocjs.com",
    "version": "0.14.0"
  }
});
