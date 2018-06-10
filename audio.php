		<link rel='stylesheet' href='/public/css/audio.css' type='text/css'>

		<div class='container_audio'>
		    <audio id='player' ontimeupdate='initProgressBar();initVolumeBar()'>
		        <source type='audio/mp3'>
		    </audio>
		    <div class='audio_info'>
		        <div class='audio_img flex' style='background-image: url(/public/img/culto/ideas.png);'>
		            <div class='loader_background flex'>
		                <div class='loader'></div>
		            </div>
		        </div>
		        <div class='audio_text flex'>
		            <div>A posição cristã em meio ao caos</div>
		            <div>27/05/2018</div>
		        </div>
		    </div>
		    <div class='rewind material-icons'>fast_rewind</div>
		    <div class='play pause'>
		        <div class='material-icons'>play_arrow</div>
		        <div class='material-icons'>pause</div>
		    </div>
		    <div class='forward material-icons'>fast_forward</div>
		    <div class='audio_controls'>
		        <div class='start_time'>00:00</div>
		        <div class='progress_bar flex' id='seek_point'>
		            <div class='progress_background'>
		                <div class='progress_forward'></div>
		                <div class='progress_slider'></div>
		            </div>
		        </div>
		        <div class='end_time'>00:00</div>
		    </div>
		    <div class='volume_controls flex'>
		        <div class='play volume mute'>
		            <div class='material-icons'>volume_off</div>
		            <div class='material-icons'>volume_up</div>
		        </div>
		        <div class='volume_container'>
		            <div class='progress_bar flex' id='seek_point2'>
		                <div class='progress_background'>
		                    <div class='progress_forward'></div>
		                    <div class='progress_slider'></div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

    <script>
				var url = "/public/js/audio.js";
				$.getScript(url);
		</script>
