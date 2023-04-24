import CroppieClass from "./CroppieClass";

export default () => {
    return {
        showCroppie : false,
        croppie : {},
        src : null,
        setImage() {
            const viewport = { width: 300, height: 300, type: 'circle' }
            const boundary = { width: 340, height: 340, type: 'circle' }
            const options = {}
            const event = 'saveMultimedia'
            const saveAs = 'base64'
            const saveOptions = {
                enableExif: true,
                size: { 
                    width: 300, 
                    height: 300
                },
                format: 'png'
            }

            this.croppie = new CroppieClass(
                viewport,
                boundary,
                options,
                saveAs,
                saveOptions,
                event,
                this.$refs.croppie,
                this.$refs.input,
            )
            this.croppie.setImage()
            this.showCroppie = true
        },

        saveCroppie() {
            this.croppie.saveCroppie(this.$wire)
            this.showCroppie = false
        }

    }
}