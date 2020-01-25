export default class Biochemistry {
    constructor(
        total_protein = '',
        albumin = '',
        sugar_f = '',
        sugar_pp = '',
        sugar_r = '',
        patient_id = '',
    ) {

        this.total_protein = total_protein;
        this.albumin = albumin;
        this.sugar_f = sugar_f;
        this.sugar_pp = sugar_pp;
        this.sugar_r = sugar_r;
        this.patient_id = patient_id;
    }
}
