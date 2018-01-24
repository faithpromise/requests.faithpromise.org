@extends('layouts.main')

@section('content')

    <section class="Section">
        <div class="Section-container Section-container--narrow">

            <h1 class="Section-title">Creative Request</h1>
            <p class="Section-intro">The information you provide here will help us determine who needs to meet together and kickstart your project.</p>

            <div class="Section-body">

                <form class="Form" method="post">

                    <div class="Form-body">

                        <ul class="Tabs Tabs--center">
                            <li class="Tabs-item">
                                <input type="radio" id="project_type_event" name="project_type" checked>
                                <label for="project_type_event">Event</label>
                            </li>
                            <li class="Tabs-item">
                                <input type="radio" id="project_type_other" name="project_type">
                                <label for="project_type_other">Other Project</label>
                            </li>
                        </ul>

                        <input class="Form-control" type="text" name="name" placeholder="your name" value="" required>
                        <input class="Form-control" type="text" name="email" placeholder="email" value="" required>

                        <p class="Form-label">When is the event?</p>

                        <input class="Form-control" type="date" name="email" placeholder="event date" value="" required>

                        <p class="Form-label">What types of advertising do you need?</p>

                        <ul class="CheckList">
                            <li><label><input type="checkbox"> Printed Materials</label>
                            </li> <!-- TODO: Help icon -  (cards, signs, etc) -->
                            <li><label><input type="checkbox"> Social Media Post</label></li>
                            <li><label><input type="checkbox"> Website Post</label></li>
                            <li><label><input type="checkbox"> Email Blast</label></li>
                            <li><label><input type="checkbox"> Video Commercial</label></li>
                            <li><label><input type="checkbox"> fpTV Video</label></li>
                        </ul>

                        <p class="Form-label">Please help us by describing your project with as much detail as possible.</p>
                        <textarea class="Form-control" name="body" placeholder="" required></textarea>

                    </div>

                    <div class="Form-footer">
                        <button type="submit">Send</button>
                    </div>

                </form>

            </div>

        </div>
    </section>

@endsection