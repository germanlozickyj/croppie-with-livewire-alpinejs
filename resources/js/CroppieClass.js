import Croppie from 'croppie'

export default class CroppieClass {
    constructor(viewport, boundary, options, saveAs, saveOptions, event, refsCroppie, refsInput) {
        this.viewport = viewport
        this.boundary = boundary
        this.options = options
        this.saveOptions = saveOptions
        this.event = event
        this.saveAs = saveAs
        this.showCroppie = false
        this.croppie = {}
        this.src = null
        this.refsCroppie = refsCroppie
        this.refsInput = refsInput
    }

    setImage() {
        this.makeCroppie()
        let files = this.refsInput.files;

        let fileReader = new FileReader();
  
        fileReader.onload = (e) => {
          this.src = e.target.result;
          this.bindCroppie(e.target.result);
          this.showCroppie = true;
        };

        fileReader.readAsDataURL(files[0]);
    }

    makeCroppie() {
        this.croppie = new Croppie(this.refsCroppie, {
            viewport: this.viewport,
            boundary: this.boundary,
            showZoomer: false,
            enableOrientation: true
        });
    }

    bindCroppie(src) {
        setTimeout(() => {
            this.croppie.bind({
                url: src,
            });
        }, 200);
    }

    async saveCroppie(wire) {
        this.croppie.result(this.saveAs, this.saveOptions)
            .then(result => {
                wire.emit(
                    this.event, {
                        image: result,
                    },
                )
                this.showCroppie = false
                this.croppie.destroy()
            })
    }

}