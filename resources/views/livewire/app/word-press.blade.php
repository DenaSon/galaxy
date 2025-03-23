<div>
    <div class="flex flex-col md:flex-row md:space-x-4">

        <div class="w-full md:w-2/3 shadow-lg m-2">


            @foreach($posts as $blog)

                <b>

                    {{ $blog->ID }}-

                    {{ $blog->post_title }}

                </b>
                <hr/>
                <br/><br/><br/>

            @endforeach


        </div>


    </div>
</div>
