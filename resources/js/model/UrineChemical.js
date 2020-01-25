export default class UrineChemical {
    constructor(
        ph = '',
        albumin = '',
        sugar = '',
        patient_id = '',
    ) {
        this.ph = ph;
        this.albumin = albumin;
        this.sugar = sugar;
        this.patient_id = patient_id;
    }
}
