@extends('layouts.app')
@section('content')
    <style>
        /* Đảm bảo nền ảnh nền đẹp và không bị kéo dãn */
        .container-fluid {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Các dạng độ rộng màn hình khác nhau */
        @media (max-width: 768px) {
            .d-flex {
                flex-direction: column;
            }

            .col-md-6 {
                width: 100%;
            }
        }

        /* Định dạng cho phần thông tin */
        .bg-whitelight {
            background-color: #f5f5f5;
            color: #333;
        }

        /* Định dạng cho bản đồ */
        .bg-warning-light {
            background-color: #fefefec2;
            color: #856404;
        }

        /* Độ rộng cố định cho bản đồ */
        #gmap_canvas {
            width: 100%;
            height: 300px;
            /* Điều chỉnh độ cao theo nhu cầu */
        }
    </style>
    <div class="container-fluid px-0 mx-0 position-relative" style="background-image: url('img/5.jpg')">
        <div class="container pt-5">
            <div class="d-flex mx-auto justify-content-center flex-wrap py-4 ">
                <div class="d-flex col-md-12">
                    <div class="d-flex col-md-6 col-sm-12 bg-whitelight flex-column p-3 ">
                        <h1 class="card-text">PLANT NEST</h2>
                            <h2 class="text-blue">Bringing Nature Home:</h2>
                            <p>Plant Nest invites you to explore the enchanting world of botanical elegance,
                                transforming your living spaces into havens of tranquility. Our plants not only infuse your
                                surroundings with vitality and color but also serve as a reminder of the profound connection
                                between humanity and the natural world. Step into the embrace of Plant Nest and discover the
                                transformative power of plants – cultivating serenity,
                                one leaf at a time.</p><span>Phone number :<span
                                    class="text-dark">0868284726</span></span><span>Address: <span class="card-text">Hanoi
                                    Aptech
                                    C5 Thuy Loi</span></span>
                    </div>
                    <div class="d-flex col-md-6 col-sm-12 bg-whitelight p-3 ">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="500" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=Hoang%20Mai&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                    href="https://123movies-i.net"></a><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 100%;
                                        width: 100%;
                                    }
                                </style><a href="https://www.embedgooglemap.net"></a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 100%;
                                        width: 100%;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column p-3 bg-whitelight col-12 my-4 justify-content-center">
                    <h2 class="text-center text-blue">FEEDBACK</h2>
                    <form action="/insert/feedback" class="" method="POST">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">FEEDBACK</label>
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <button type="submit" class="button-63"> Submit feedback</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
