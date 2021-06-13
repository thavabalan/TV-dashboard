<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
     
     
      <div class="row justify-content-center invisible mt-3" id="error-panel">
        <div class="col-10 alert alert-danger alert-dismissible p-2">
          <button id="error-panel-close" type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div id="error-messages">&nbsp;</div>

        </div>
      </div>
      <div class="container-fluid mt-3" id="publish-content">
        <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
            <div id="publish-video-container">
              <video id="publisher-video" autoplay playsinline muted controls></video>
             
              <div id="video-live-indicator">
                <span id="video-live-indicator-live" class="badge badge-pill badge-danger" style="display:none;">LIVE</span>
                <span id="video-live-indicator-error" class="badge badge-pill badge-warning" style="display:none;">ERROR</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12" id="publish-settings">
            <form id="publish-settings-form">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="sdpURL">Signaling URL</label>
                    <input type="text" class="form-control" id="sdpURL" name="sdpURL" maxlength="1024" placeholder="wss://rtmp.ttn.tv:442/webrtc-session.json" value="wss://rtmp.ttn.tv:442/webrtc-session.json">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="applicationName">Application Name</label>
                    <input type="text" class="form-control" id="applicationName" name="applicationName" maxlength="256" value="livetv"> 
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="streamName">Stream Name</label>
                    <input type="text" class="form-control" id="streamName" name="streamName" maxlength="256">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="audioBitrate">Audio Bitrate</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="audioBitrate" name="audioBitrate" value="64">
                      <div class="input-group-append">
                        <span class="input-group-text">Kbps</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="audioCodec">Audio Codec</label>
                    <div class="input-group">
                      <select class="form-control" id="audioCodec" name="audioCodec">
                        <option value="opus" selected>Opus</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="videoBitrate">Video Bitrate</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="videoBitrate" name="videoBitrate" value="3500">
                      <div class="input-group-append">
                        <span class="input-group-text">Kbps</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="videoCodec">Video Codec</label>
                    <div class="input-group">
                      <select class="form-control" id="videoCodec" name="videoCodec">
                        <option value="42e01f" selected>H.264</option>
                        <option value="VP8">VP8</option>
                        <option value="VP9">VP9</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="videoFrameRate">Frame Rate</label>
                    <div class="input-group">
                      <input type="number" class="form-control" id="videoFrameRate" name="videoFrameRate" value="30">
                      <div class="input-group-append">
                        <span class="input-group-text">fps</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="frameSize">Frame Size</label>
                    <div class="input-group">
                      <select class="form-control" id="frameSize" name="frameSize">
                        <option selected value="default">
                          Default
                        </option>
                        <option value="1920x1080">
                          1920x1080
                        </option>
                        <option value="1280x720">
                          1280x720
                        </option>
                        <option value="800x600">
                          800x600
                        </option>
                        <option value="640x360">
                          640x360
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-10">
                  <div class="form-group">
                    <label for="camera-list-select">
                      Input Camera
                    </label>
                    <select id="camera-list-select" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-2">
                  <button id="camera-toggle" class="control-button">
                    <img alt="" class="noll" id="video-off" src="./images/videocam-32px.svg" />
                    <img alt="" class="noll" id="video-on" src="./images/videocam-off-32px.svg" style="display:none;"/>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-10">
                  <div class="form-group">
                    <label for="mic-list-select">
                      Input Microphone
                    </label>
                    <select id="mic-list-select" class="form-control">
                    </select>
                  </div>
                </div>
                <div class="col-2">
                  <button id="mute-toggle" class="control-button">
                    <img alt="" class="noll" id="mute-off" src="./images/mic-32px.svg" />
                    <img alt="" class="noll" id="mute-on" src="./images/mic-off-32px.svg" style="display:none;"/>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-10">
                  <button id="publish-toggle" type="button" class="btn">Publish</button>
                </div>
                <div class="col-2">
                  <button id="publish-share-link" type="button" class="control-button mt-0">
                    <img alt="" class="noll" id="mute-off" src="./images/file_copy-24px.svg" />
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
                                     
        <script type="module" crossorigin="use-credentials" src="./publish.js"></script>
        <div>
            <span id="sdpDataTag"></span>
        </div>
</x-app-layout>
