@extends('layout.user.index')
@section('content-view')
    <div class="row justify-content-between contact">
        <div class="right wp100">
            <div class="cols-sm-5">
                <div class="rows">
                    <div class="bando">
                        <iframe class="wp100" frameborder="0" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.66124870732!2d105.84093861451794!3d21.006211893924537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zxJDhuqFpIEjhu41jIELDoWNoIEtob2EgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1454425177312" style="border:0" width="1150px">
                        </iframe>
                    </div> <!-- end bando -->
                </div> <!-- end rows -->
            </div><!-- .contact-gmap -->
        </div><!-- .col -->

        <div class="col-12 col-lg-6">
            <div class="contact-form">
                <p>Nếu bạn cần hỗ trợ,&nbsp;hãy gửi&nbsp;thông tin&nbsp;vào biểu mẫu dưới đây. Chúng tôi sẽ cố gắng&nbsp;phản hồi sớm nhất&nbsp;!</p>

                <form>
                    <input type="email" class="h33" placeholder="Your Email">
                    <input type="text" class="h33" placeholder="Subject">
                    <textarea placeholder="Your Message" rows="4"></textarea>
                    <button type="button" class="btn text-white text-center" style="background-color:#D91F1F ">Gửi đi</button>
                </form>
            </div><!-- .contact-form -->
        </div><!-- .col -->

        <div class="col-12 col-lg-6">
            <div class="contact-info">
                <h3>Hội Sinh viên ĐH Bách Khoa Hà Nội</h3>

                <p>Văn phòng Hội Sinh viên phòng 101 - KTX Đại học Bách khoa Hà Nội</p>

                <ul class="p-0 m-0">
                    <li><a href="https://www.facebook.com/hoisinhvienbkhn/"><i class="fa fa-facebook-square"></i> Hội Sinh viên ĐH Bách khoa Hà Nội</a></li>
                    <li><a href="https://m.me/hoisinhvienbkhn?fbclid=IwAR2XD85gk4XJThtbLIholizQaoZ-7UtxWMoao3B9aggzgdJwDDxbKxAQXZc"><i class="fa fa-telegram"></i> m.me/hoisinhvienbkhn</a></li>
                    <li><a href="#"><i class="fa fa-phone"></i> Gọi 094 535 35 68</a></li>
                </ul>
            </div><!-- .contact-info -->
        </div><!-- .col -->
    </div><!-- .row -->
@endsection