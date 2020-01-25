export default class HematologyDlc {
    constructor(
        neurophils = '',
        lymphocytes = '',
        monocytes = '',
        eosinophils = '',
        basophis = '',
        patient_id = '',
    ) {
        this.neurophils = neurophils;
        this.lymphocytes = lymphocytes;
        this.monocytes = monocytes;
        this.eosinophils = eosinophils;
        this.basophis = basophis;
        this.patient_id = patient_id;
    }
}
