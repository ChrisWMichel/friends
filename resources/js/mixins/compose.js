import axios from 'axios';

    export default {
    data(){
        return {
            form:{
                body:'',
                media:[]
            },
            media:{
                images:[],
                video: null,
                progress:null
            },
            mediaTypes:{}
        }
    },
    methods:{
        async submit(){
            if(this.media.images.length || this.media.video){
                const media = await this.uploadMedia();
                this.form.media = media.data.data.map(m => m.id)
            }

            await this.post();

            this.form.body = '';
            this.form.media = [];
            this.media.images = [];
            this.media.video = null;
            this.media.progress = null;
    },
    async uploadMedia(){
        return await axios.post('/api/media', this.buildMediaForm(), {
        headers:{
            'Content-Type': 'multipart/form-data'
        },
            onUploadProgress: this.handleUploadProgress
        })
    },
    handleUploadProgress(event){
    this.media.progress = parseInt( Math.round((event.loaded / event.total) * 100));
},
    async getMediaTypes(){
    this.mediaTypes = (await axios.get('/api/media/types')).data.data;

},
    buildMediaForm(){
    const form = new FormData();

    if(this.media.images.length){
    this.media.images.forEach((image, index) => {
    form.append(`media[${index}]`, image)
})
}
    if(this.media.video){
    form.append(`media[0]`, this.media.video);
}

    return form;

},
    handleMediaSelected(files){
    Array.from(files).slice(0, 4).forEach(file => {
    if(this.mediaTypes.images.includes((file.type))){
    this.media.images.push(file);
}
    if(this.mediaTypes.videos.includes((file.type))){
    this.media.video = file;
    //console.log('this.media.video', this.media.video);
}
})

    if(this.media.vide){
    this.media.images = [];
}
},
    removeVideo(){
    this.media.video = null;
},
    removeImage(image){
    this.media.images = this.media.images.filter(i => {
    return i !== image
})
}
},
    mounted(){
    this.getMediaTypes()
},
    computed:{
    tooLong(){
    return this.form.body.length > 281;
}
}
}
