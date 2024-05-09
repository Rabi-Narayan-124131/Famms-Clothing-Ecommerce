<style>
    .comment_button {
        display: inline-block;
        padding: 10px 45px;
        background-color: #af393f;
        border: 1px solid #af393f;
        color: #ffffff;
        border-radius: 35px;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        text-transform: uppercase;
        margin-top: 35px;
        font-weight: 600;
        width: 100%;
        max-width: 285px;
    }

    .comment_button:hover {
        background-color: transparent;
        color: #f7444e;
    }
    .comment_close_button {
        display: inline-block;
        padding: 10px 45px;
        background-color: #e698b2;
        border: 1px solid #e698b2;
        color: #ffffff;
        border-radius: 35px;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
        text-transform: uppercase;
        margin-top: 35px;
        font-weight: 600;
        width: 100%;
        max-width: 285px;
    }

    .comment_close_button:hover {
        background-color: transparent;
        color: #d4ced0;
    }

    .r-c {
        padding: 0.5rem 1.8rem !important;
        font-size: 0.8rem !important;
        line-height: 0.8 !important;
        border-radius: 1.20rem !important;
    }

    .r-c-a{
        color:#ffffff!important;
    }

    .c-p {
        padding-bottom: 12px !important;
    }

    .c-h {
        font-size: 1.2rem !important;
        padding-top: 20px !important;
    }

    .reply {
        width: 300px;
        padding: 10px 1px;
    }

    .r-c-b {
        margin-top: 10px !important;
    }

</style>
<section class="product_section">
    <div class="container-fuild">
        <div class="box">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                            <h3>Comments</h3>
                            @if (session()->has('message'))
                            <div class="alert alert-success" style="float: right">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                                    style="float: right; padding: 0px 10px;">x</button>

                            </div>
                            @endif
                        </div>

                        <form action="{{ url('add_comment') }}" method="POST">

                            @csrf

                            <textarea class="form-control input_color" id="exampleTextarea1" name="comment" rows="4"
                                placeholder="Enter Your Comments Here"></textarea>
                            <button type="submit" class="comment_button">Comment</button>


                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="box">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                            <h3>All Comments</h3>
                            @if (session()->has('reply_message'))
                            <div class="alert alert-success" style="float: right">
                                {{ session()->get('reply_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"
                                    style="float: right; padding: 0px 10px;">x</button>

                            </div>
                            @endif
                        </div>

                        @foreach ($comment as $comment)

                        <div>
                            <p class="c-h"><b>{{ $comment->name }}</b></p>
                            <p class="c-p">{{ $comment->comment }}</p>
                            <button class="btn btn-primary r-c"><a class="r-c-a" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a></button>

                            @foreach ($reply as $data)

                            @if ($data->comment_id == $comment->id)

                            <div style="padding: 0px 30px !important;">
                                <p class="c-h"><b>{{ $data->name }}</b></p>
                                <p class="c-p">{{ $data->reply }}</p>
                                <button class="btn btn-primary r-c"><a class="r-c-a" href="javascript::void(0)" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a></button>

                            </div>

                            @endif

                            @endforeach

                        </div>


                        @endforeach


                        <div style="display: none;" class="reply">
                            <form action="{{ url('add_reply') }}" method="POST">

                                @csrf

                                <input type="hidden" id="commentId" name="commentId">
                                <textarea class="form-control input_color" id="exampleTextarea1" name="reply"
                                    rows="4" placeholder="Enter Your Comments Here"></textarea>
                                <button type="submit" class="comment_button r-c-b">Reply</button>
                                <button class="comment_close_button"><a href="javascript::void(0)"
                                    onclick="reply_close(this)">Close</a></button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script type="text/javascript">
    function reply(caller) {

        document.getElementById('commentId').value = $(caller).attr('data-Commentid');

        $('.reply').insertAfter($(caller));

        $('.reply').show();

    }

    function reply_close(caller) {

        $('.reply').hide();

    }

</script>

<script>

    document.addEventListener("DOMContentLoaded", function (event) {

        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);

     });

     window.onbeforeunload = function (e) {

        localStorage.setItem('scrollpos', window.scrollY);

      };

</script>
