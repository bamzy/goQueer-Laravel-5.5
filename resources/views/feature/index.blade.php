@extends('dashboard')

@section('section')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">



                <b>Authentication</b>
                <ul>
                    <li>Allow users to log in with an a email and password</li>
                    <li>Users can register for a new account under “Register”</li>
                </ul>

                <b>Media</b>
                <ul>
                    <li>Allow users to define media: users can upload a Sound/Video/PDF file with additional description and title.</li>
                    <li>Users can delete a media </li>
                    <li>Users can see the details of each media by selecting “show” </li>
                    <li>Users can leave comment on each media which will be shown at the bottom of the page showing details of that media. (this is similar to a message board that shows all the messages related to one media)</li>
                </ul>
                <b>Location</b>
                <ul>
                   <li>Users can add a location with some details</li>
                    <li>Users can select a polygon on the map while adding a new location. the information of the polygon is not saved in the database yet and cannot be retrieved when showing a location</li>
                    <li>Users can “Assign” media to a location and see any other assigning</li>
                    <li>Users can see the already assigned media to a location by “Show”ing the details of that location.</li>
                    <li>Users can remove the assign media.</li>
                </ul>
                <p>
                    Since setting up the project and building the database is fully automatized (explained in README.md) and it also allows for populating the database with some sample data.
                    The input validation on each form provided by Laravel and the error message returned to user allows a more informative interaction with the webpage and also a very readable code in the controller side.
                    Accessing the database is done through Eloquent which add some abstraction to the basic query building, but still remains intuitive. Also the classes that represent models only require the name of the table they represent and Eloquent will handle accessing data from the table automatically.
                    The CSS is the basic bootstrap that did not require much modification so far but is easily modifiable.
                </p>

            </div>
        </div>
    </div>
    </div>
@endsection