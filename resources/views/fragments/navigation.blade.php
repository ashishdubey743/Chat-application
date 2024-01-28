<div class="container" >
    <div class="row" >
        <div class="col-sm-4" style="background-color:#d1d7db;">
            <div class="container-fluid" >
                <div class="row mt-3" >
                    <div class="col-sm-2">
                        <!-- Profile Image Container -->
                        <div class="profile-image-container">
                        <a data-bs-toggle="dropdown" href="#" aria-expanded="false">
                            <img src="{{ asset('storage/' . session('user.image')) }}" alt="Profile Image" class="profile-image">
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/add_profile_image">Add Image</a></li>
                            @if(session("user.image") != "")
                            <li><a class="dropdown-item" href="/delete_image/{{ session('user.id') }}">Delete Image</a></li>
                            @endif
                            </ul>
                        </a>
                            
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2"><a class="text-dark" href=""><i class="fa-solid fa-people-group icon"></i></a></div>
                    <div class="col-sm-2"><a class="text-dark" href=""><i class="fa-solid fa-globe icon"></i></a></div>
                    <div class="col-sm-2"><a data-bs-toggle="dropdown" href="#" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical icon"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                            <!-- <li><hr class="dropdown-divider"></li> -->
                        </ul>
                    </a></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 w-100 mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-icon">
                        </div>
                    </div>
                </div>