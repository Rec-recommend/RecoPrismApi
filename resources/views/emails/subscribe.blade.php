<head>
<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans|Pacifico&display=swap" rel="stylesheet">
</head>
<body style="margin-left:80px;background-size:100%;background-repeat:no-repeat;background-image:url(https://c1.sfdcstatic.com/content/dam/blogs/ca/Blog%20Posts/digital-direct-mail-header.png)">
<div style="font-size:25px;color:teal;font-family:'Pacifico',cursive;">
  <h2>  Welcome to Recoprism {{$client->name}} </h2>
  </div>
<div style="margin-left:200px;font-size:15px;font-family: 'PT Sans', sans-serif;">
Your Registeration Has Completed ... 
<div style="font-size:15px;font-weight:bold;">
Your Subscription Plan is {{$client->plan->name}}
</div>
<div style="font-size:15px;font-weight:bold;">
Your Domain Name is : <a href="{{$client->subdomain}}.recoprism.ml">{{$client->subdomain}}.recoprism.ml</a>
</div>
</div>
</body>
