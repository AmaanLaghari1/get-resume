<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amaanullah Khan Laghari</title>
    <style>
        body {
            padding: 20px;
        }

        a {
            text-decoration: none;
            font-style: italic;
        }

        span {
            font-family: FontAwesome;
        }

        .links {
            display: flex;
            justify-content: space-between;
            width: 80%;
        }

    </style>
</head>
<body>
<font face="Arial">
    <h1><span class="fa-solid fa-user"></span> {{$resume['title']}}</h1>
    <h3 style="font-weight: lighter;">{{$resume['profession']}}</h3>
    
    <table width="100%">
        <tr>
            <td width="25%"><span class="fa-solid fa-location-dot"></span>{{$resume['address']}}</td>
            <td width="25%"><span class="fa-solid fa-envelope"></span> <a href="mailto:laghariamaan@gmail.com">{{$resume['email']}}</a></td>
            <td width="25%"><i class="fa-brands fa-linkedin"></i> <a href="https://www.linkedin.com/in/amaan-laghari-86a7a5233/" target="_blank">amaan-laghari-86a7a5233</a></td>
            <td width="25%"><span class="fa-solid fa-phone"></span> <a href="tel:923133551379">{{$resume['phone']}}</a></td>
        </tr>
    </table>
    <hr>
    <dt>
        <h3>SUMMARY <span class="fa fa-list" aria-hidden="true"></span></h3>
        <!-- <img style="width: 18px;" class="" src="./telephone.png" alt=""> -->
    </dt>
    
    <dd align="justify">
        {{$resume['objective']}}
    </dd>

    <hr>

    <dt>
        <h3>EDUCATION <span class="fa-solid fa-graduation-cap"></span></h3>
    </dt>
    @php
        $education = json_decode($resume['education'])
    @endphp
    @foreach($education as $edu)
    <dd>
        <p>
            <strong>{{$edu->degree}}, </strong>{{$edu->yop}}
        </p>
        <p>
            <em><b>{{$edu->institute}}</b></em>
        </p>
        <p>
            Result - <b>{{$edu->marks}}</b>
        </p>
    </dd>
    @endforeach

    <hr>

    <dt>
        @php
            $experience = json_decode($resume['experience']);
        @endphp
        <h3>EXPERIENCE <span class="fa fa-history" aria-hidden="true"></span></h3>
    </dt>
    @foreach($experience as $exp)

    <dd>
        <strong>{{$exp->company}}.</strong>
        <p>
            <strong><em>{{$exp->position}}</em></strong>
        </p>
        <p>{{$exp->description}}</p>
        <p><small><b>Start - {{$exp->start_date}} End - {{$exp->end_date}}</b></small></p>
    </dd>
    @endforeach

    <hr>

    <dt>
        @php
        print_r($resume['skills'])

        @endphp
        <h3>SKILLS <span class="fa fa-cogs" aria-hidden="true"></span></h3>
    </dt>
    
        <table width="900">
            <tr>
                <td width="300">
                    <ul type="square">
                        <li>HTML5</li>
                        <li>CSS</li>
                        <li>Bootstrap5</li>
                    </ul>
                </td>
                <td width="300">
                    <ul type="square">
                        <li>JavaScript</li>
                        <li>jQuery</li>
                        <li>Object Oriented Paradigm</li>
                    </ul>
                </td>
                <td width="300">
                    <ul type="square">
                        <li>Front-End Web Development</li>
                        <li>React</li>
                    </ul>
                </td>
            </tr>
        </table>

    <hr>
    
    <dt><h3>CERTIFICATIONS <span class="fa-solid fa-certificate"></span></h3></dt>
    <table width="100%">
        <tr>
            <td width="50%" height="50px">
                    <ul type="square">
                        <li>
                            <p><span class="fa-brands fa-meta" style="color: #1d5ecd;"></span> <strong>Meta</strong> certified in Introduction to Front-end Development</p>
                            <em>Feb 2023</em>
                        </li>
                    </ul>
            </td>
            <td width="50%" height="50px">
                    <ul type="square">
                        <li>
                            <p><span class="fa-brands fa-meta" style="color: #1d5ecd;"></span> <strong>Meta</strong> certified in Programming with JavaScript</p>
                            <em>Feb 2023</em>
                        </li>
                    </ul>
            </td>
        </tr>
        
        <tr>
            <td width="50%" height="50px">
                <ul type="square">
                    <li>
                        <p><span class="fa-brands fa-meta" style="color: #1d5ecd;"></span> <strong>Meta</strong> certified in React Basics</p>
                        <em>Mar 2023</em>
                    </li>
                </ul>
            </td>
            <td width="50%" height="50px">
                <ul type="square">
                    <li>
                        <p><span class="fa-brands fa-meta" style="color: #1d5ecd;"></span> <strong>Meta</strong> certified in Advanced React</p>
                        <p>Portfolio Project - <a href="https://aklportfolio.netlify.app/" target="_blank">https://aklportfolio.netlify.app/</a></p>
                        <em>May 2023</em>
                    </li>
                </ul>
            </td>
        </tr>
    
        <tr>
            <td width="50%" height="50px">
                    <ul type="square">
                        <li>
                            <p><strong>Learnoverse</strong> certified in JavaScript Course for Beginners</p>
                            <em>Feb 2023</em>
                        </li>
                    </ul>
            </td>
            <td width="50%" height="50px">
                <ul type="square">
                    <li>
                        <p><strong>Cisco</strong> certified in JavaScript Essentials 1 (JSE)</p>
                        <em>Apr 2023</em>
                    </li>
                </ul>   
            </td>
        </tr>
    </table>
    

</font>
</body>
</html>