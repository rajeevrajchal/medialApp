export default class Hematology {
    constructor(
        haemoglobin = '',
        plateles = '',
        bloodgroup = '',
        malarialparasites = '',
        hba1c = '',
        patient_id = '',
    ) {

        this.haemoglobin = haemoglobin;
        this.plateles = plateles;
        this.bloodgroup = bloodgroup;
        this.malarialparasites = malarialparasites;
        this.hba1c = hba1c;
        this.patient_id = patient_id;

    }
}
