@extends('layout.layout')
@section('title', 'Dashboard')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .card-body{
        border-radius: 1rem
    }
    .title{
        padding: 0 20px;
        display: flex;
        justify-content: space-between
    }

    .title img{
        width: 40px;
        height: 40px;
    }

    .row{
        margin-top: 30px;
        margin-left: 10px;
        margin-right: 30px;
    }

    #kotak1{
        background-color: #757171;
    }
    #kotak2{
        background-color: #BDBDBD;
    }
    #kotak3{
        background-color: #D9D9D9;
    }
    /* #card-text1{
        color: #D9D9D9
    }
    #card-title1{
        color: #D9D9D9
    } */
    .card{
        width: 300px;
        height: 150px;
        border-radius: 1rem;
    }
    .card-text{
        margin-top: 20px;
    }
    .title{
        margin-left: 30px;
        margin-top: 40px;
    }
    .img{
        margin-left: 110px;
        margin-top: 20px;
        width: 150px;
        height: 150px;
    }
    .loglink{
         text-decoration: none; 
        color: #D9D9D9;
    }
    #mychart{
        margin-top: 200px;
    }

body{
  background-color: #eee;

}

.display-picture{
  margin-left: auto;
}
.display-picture img{
  width: 50px;
  border-radius: 50%;
  border:2px solid #fff;
} 
.display-picture img:hover{
border:2px solid #757171;
}
.card{
  transition: 0.5s ease;
}

.card ul{
  display: flex;
  align-items: flex-start;
  flex-direction: column;
  background: #757171;
  position: absolute;
  top: 4rem;
  right:0rem;
    border-radius: 10px;
    padding: 10px 50px 10px 20px;
}
.card ul li{
 
  padding: 5px 0;
  color: #FFF;
  font-size: 14px;
}
.hidden{
  display: none;
}
a{
  text-decoration: none;
  color:#fff;
}

</style>

<div class="title">
    <div>
        <h1>Dashboard</h1>
        <h5>selamat datang, admin!</h5>
    </div>
    {{-- <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://th.bing.com/th/id/R.3cf356eb37f97a53f6adcb70f885f968?rik=irVP%2bEr%2f7LuDyA&riu=http%3a%2f%2fimages5.fanpop.com%2fimage%2fphotos%2f31200000%2fAnime-anime-31223028-1280-1024.jpg&ehk=k9X%2b%2fJ%2bRZZ8JD2V1yUKky%2bLjiED9%2fq4e08CoAeRokzA%3d&risl=&pid=ImgRaw&r=0" class="rounded-circle" height="42" alt="" width="42" loading="lazy" />
            </a>
            <div class="dropdown-menu dropdown-menu-left h-1" aria-labelledby="navbarDropdown">
                <a class="dropdown-item my-0" href="/dashboard/siswa/profil">Profil</a>
                <hr>
                <a href="{{ url('/logout') }}" class="dropdown-item">Logout</a>
            </div>
        </li>
    </ul> --}}
        <div>
            <ul>
                <a href="#" class="display-picture"><img src="https://i.pravatar.cc/85" alt=""></a><!--Profile Image-->   
            </ul>
            <div class="card hidden"><!--ADD TOGGLE HIDDEN CLASS ATTRIBUTE HERE-->
            <ul><!--MENU-->
                <li><a href="#">Profile</li></a>
                <li><a href="#">Account</li></a>
                <li><a href="#">Settings</li></a>
                <li><a href="#">Log Out</li></a>
            </ul>
        </div>
        </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Kotak pertama -->
            <div class="card">
                <div class="card-body" id="kotak1">
                    <!-- Isi kotak pertama -->
                    <h5 class="card-title" id="card-title1">Log Activity</h5>
                    <a class="loglink" href="/log">klik disini untuk melihat Log Activity.</a>
                    <p>{{$data['totalLogs']}}</p>
                    <img class="img" src="{{ asset('foto/log.png') }}" alt="Deskripsi Gambar">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Kotak kedua -->
            <div class="card">
                <div class="card-body" id="kotak2">
                    <!-- Isi kotak kedua -->
                    <h5 class="card-title">Wisatawan</h5>
                    <p class="card-text">Jumlah wisatawan</p>
                    <p>{{$data['totalWisatawan']}}</p>
                    <img class="img" src="{{ asset('foto/wisatawan.png') }}" alt="Deskripsi Gambar">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Kotak ketiga -->
            <div class="card">
                <div class="card-body" id="kotak3">
                    <!-- Isi kotak ketiga -->
                    <h5 class="card-title">Penyewaan</h5>
                    <p class="card-text">Jumlah penyewaan</p>
                    <p>{{$data['totalPenyewaan']}}</p>
                    <img class="img" src="{{ asset('foto/penyewaan.png') }}" alt="Deskripsi Gambar">
                </div>
            </div>
        </div>
            
    <div class="divchart">
        <canvas id="myChart" style="margin-top: 200px; height: 200px;"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($data['labels']),
                    datasets: [{
                        label: 'Example Chart',
                        data: @json($data['data']),
                        backgroundColor: '#757171', // Warna latar belakang
                        borderColor: '#757171', // Warna garis
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        let card = document.querySelector(".card"); //declearing profile card element
let displayPicture = document.querySelector(".display-picture"); //declearing profile picture

displayPicture.addEventListener("click", function() { //on click on profile picture toggle hidden class from css
card.classList.toggle("hidden")})
    </script>
    </div>
</div>
@endsection