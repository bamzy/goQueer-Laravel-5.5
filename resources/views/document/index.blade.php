@extends('dashboard')

@section('section')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">

                <img class="img-responsive img-left" src="img/uofa_logo.png" align="middle">
                <br/>

                <p>
                    This project is going to be used to allow the research team, working under Dr. Engel's supervision,
                    involved in the "Go Queer" project to upload the information they gathered and currated from
                    Edmonton Public Library, UofA Libraries and personal archives about the 253 historical locations
                    that should be investigated for the purpose of this research</br></br></br>

                </p>
                    <b>Special Features</b>
                <ul>
                    <li>Commenting on the message board of the website about the latest status of project what needs to
                        be done next.
                    </li>
                    <li>Users should be able to login in order to leave comments and upload pictures through a form
                        associated to a particular location id.
                    </li>
                    <li>Show an IFrame of a street view map that allows admin to select spots on map to choose where the
                        uploaded information are associated to.
                    </li>
                    <li>A gallery like page that allows visitors to see the information archived so far.</li>
                    <li>Allow users to tag their messages with keywords, then allow users to browse and view archive
                        records via keywords
                    </li>
                    <li>This website would simultaniously provide a RESTFull API to the mobile app to pull these
                        information and show them to the end user
                    </li>
                    <li>
                        <a href="https://docs.google.com/a/ualberta.ca/document/d/1fezbhPrdfPRPd88NyH8nYgXIlxrYH_YA1nAHE3ekogA/edit?usp=sharing">Working
                            Version of System Architecture</a></li>

                </ul>
                <img class="img-responsive img-left" src="img/structure.png" alt="">
                </br>
                <p><b>GIS Framework</b></p>
                <ul>
                    <li><b>QGIS:</b> is free, we can use existing web map servers or host our own.</li>
                    <li><b>ArcGIS:</b>
                        The ArcGIS JavaScript API is now available to the public
                        The new ArcGIS JavaScript API and its accompanying online SDK are now available for public use.
                        With the ArcGIS JavaScript API you can add GIS functionality to your Web applications with
                        JavaScript code that runs in the browser. The online SDK includes help and samples for the API
                        and is hosted within the ArcGIS Server Resource Center web site. Who can use the ArcGIS
                        JavaScript API? Is there a cost? Everyone can use the ArcGIS JavaScript API. There is no fee for
                        using the ArcGIS JavaScript API or deploying an application built with it.What services does the
                        API work with? The ArcGIS JavaScript API works with ArcGIS Server 9.3 services, which are
                        exposed through REST technology. If you haven’t received or deployed 9.3 yet, you can still get
                        started learning the API using several ESRI Sample Servers that have been configured for this
                        purpose. The API also consumes ArcGIS Online services. This sample shows how you can add an
                        ArcGIS Online layer to a JavaScript application.
                        How much does Arcgis cost?
                        Cost is $1,500 for a single use license / $3,500 for concurrent. ArcGIS Standard- Allows
                        everything found in the basic version but allows additional capabilities for multi-user
                        platforms and editing enterprise level geodatabases. This level is required to take advantage of
                        many custom editing tools published by esri.

                        This means we can show their general maps in our app for free, users would see their watermark,
                        a customized map to be shown requires subscription. APIs are only for javascript which means a
                        web based representation in our app.
                        It would generate android & iOS app but will not have the exact game like characteristic that we
                        want
                    </li>
                </ul>
                </p>

            </div>
        </div>
    </div>
    </div>
@endsection