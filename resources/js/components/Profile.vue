<template>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-3">

                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img id="user-image" class="profile-user-img img-fluid img-circle"
                                 src="/img/avatar.png"
                                 alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center">{{ form.name }}</h3>

                          <p class="text-muted text-center">{{ form.designation}}
                          <br/><small class="text-muted text-center">{{ form.access_level}}</small>
                         </p>


                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Projects</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                              <b>Risks</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                              <b>Activities</b> <a class="float-right">13,287</a>
                            </li>
                          </ul>

                          <a href="#" class="btn btn-primary btn-block"><b>Delegate my Duties</b></a>
                          <div class="custom-file pt-4" @change="UploadFile()">
                              <input type="file" class="custom-file-input" id="UserProfileFile" required>
                              <label class="custom-file-label" for="UserProfileFile">Choose file...</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                      <div class="card">
                        <div class="card-header p-2">
                          <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Send Feedback</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class=" active tab-pane" id="timeline">
                              <!-- The timeline -->
                              <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                  <span class="bg-danger">
                                    10 Feb. 2014
                                  </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-envelope bg-primary"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                    <div class="timeline-body">
                                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                      quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                      <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-user bg-info"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                    </h3>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-comments bg-warning"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                    <div class="timeline-body">
                                      Take me to your leader!
                                      Switzerland is small and neutral!
                                      We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                      <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                  <span class="bg-success">
                                    3 Jan. 2014
                                  </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-camera bg-purple"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                    <div class="timeline-body">
                                      <img src="http://placehold.it/150x100" alt="...">
                                      <img src="http://placehold.it/150x100" alt="...">
                                      <img src="http://placehold.it/150x100" alt="...">
                                      <img src="http://placehold.it/150x100" alt="...">
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                  <i class="far fa-clock bg-gray"></i>
                                </div>
                              </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                              <form class="form-horizontal">
                                <div class="form-group row">
                                  <label for="inputExperience" class="col-sm-2 col-form-label">Message</label>
                                  <div class="col-sm-10">
                                    <textarea class="form-control" v-model="form.name" id="inputExperience" placeholder="Experience"></textarea>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <!-- /.tab-pane -->
                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                      </div>
                      <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
        </div>
    </div>
</template>

<script>
    export default {
      data(){
        return {
          form: new Form({
            id:'',
            name: '',
            email: '',
            password: '',
            designation:'',
            access_level:'',
            remember: false
          })
        }
      },
      methods:{
        UploadFile(e){
          let file = $('#UserProfileFile').get(0).files[0];
          let reader = new FileReader();
          reader.onloadend = function() {
            console.log('RESULT', reader.result)
          }
          reader.readAsDataURL(file);

        }
      },
      created(){
        axios.get('api/profile')
        .then(({ data})=> (this.form.fill(data)));
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
