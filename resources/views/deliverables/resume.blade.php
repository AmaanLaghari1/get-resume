<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$resume['title']}}</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container p-2">
    
    <h1 class="display-2">{{$resume['title']}}</h1>
    <h3>{{$resume['profession']}}</h3>
    <p class="small fst-italic">{{$resume['phone']}}</p>
    <p class="small fst-italic">{{$resume['email']}}</p>
    <p class="small fst-italic">{{$resume['address']}}</p>

    <hr>

    <h5>Objective</h5>
    <p class="lead">
        {{$resume['objective']}}
    </p>
    
    <hr>

    <h5>Skills</h5>
    <?php
        $skills = json_decode($resume['skills'])
    ?>
    <ul>
        @if($skills)
        @foreach(@$skills as $skill)
        <li>{{@$skill}}</li>
        @endforeach
        @endif
    </ul>
    
    <hr>
    
    <h5>Education</h5>
    <?php
        $education = json_decode($resume['education']);
        ?>
        <div class="d-flex gap-2">
            @foreach($education as $row)
                <div class="card p-2">
                    <p>{{$row->institute}}</p>
                    <p>{{$row->degree}} - {{$row->yop}}</p>
                    <p>{{$row->marks}}</p>
                </div>
            @endforeach
        </div>

    <hr>
    
    <h5>Experience</h5>
    <?php
        $experience = json_decode($resume['experience']);
        ?>
        <div class="d-flex gap-2">
            @foreach($experience as $row)
                <div class="card p-2">
                    <p>{{$row->position}}</p>
                    <p>{{$row->company}}</p>
                    <p>{{$row->description}}</p>
                    <p>{{$row->start_date}} to {{$row->end_date}}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>