export default class BiochemistryRtf {
    constructor(
        urea = '',
        creatinine = '',
        sodium = '',
        potassium = '',
        patient_id = '',
    ) {
        this.urea = urea;
        this.creatinine = creatinine;
        this.sodium = sodium;
        this.potassium = potassium;
        this.patient_id = patient_id;
    }
}
