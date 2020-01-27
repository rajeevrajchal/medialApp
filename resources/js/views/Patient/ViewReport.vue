<template>
    <div class="main-report">

        <div class="report" id="printMe">
            <br><br><br><br>
            <div class="container">
                <div class="card-title" style="text-align: center;">
                    <h2>Sanga Medical Center</h2>
                    <p>Sangha, Banepa - 13, Kavre</p>
                    <span>9849174350</span>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td>{{patient.name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Age:</td>
                                        <td>{{patient.age}}</td>
                                    </tr>

                                    <tr>
                                        <td>Gender:</td>
                                        <td>{{patient.gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td>{{patient.address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact:</td>
                                        <td>{{patient.contact}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>Ticket No:</td>
                                        <td>{{patient.tn}}</td>
                                    </tr>

                                    <tr>
                                        <td>Registered Date:</td>
                                        <td> {{patient.created_at}}</td>
                                    </tr>

                                    <tr>
                                        <td>Report Date:</td>
                                        <td> {{d.toLocaleDateString("en-US", options)}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" style="text-align: center">INVESTIGATION REPORT</li>
                    </ol>
                </nav>
                <div class="card">
                    <table class="table table-hover" style="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th scope="col" >Test</th>
                            <th scope="col" >Result</th>
                            <th scope="col" >Unit</th>
                            <th scope="col">Bio-Ref.Range</th>
                        </tr>
                        </thead>
                        <tbody v-if="patient.lipid_flag">
                        <tr>
                            <th scope="row" colspan="2">Lipid</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">Total Cholestrol</td>
                            <td colspan="2">{{lipid.totalcholesterol}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Triglyceride</td>
                            <td colspan="2">{{lipid.triglyceride}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">HDL-cholesterol</td>
                            <td colspan="2">{{lipid.hdl}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">LDL-cholesterol</td>
                            <td colspan="2">{{lipid.ldl}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">VLDL-cholwaterol</td>
                            <td colspan="2">{{lipid.vldl}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Calcium</td>
                            <td colspan="2">{{lipid.calcium}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Vitamin D</td>
                            <td colspan="2">{{lipid.vitaminD}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        v
                        <tr>
                            <td colspan="2">Vitamin B12</td>
                            <td colspan="2">{{lipid.vitaminB12}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Uric Acid</td>
                            <td colspan="2">{{lipid.uric}}</td>
                            <td colspan="2">mg/dl</td>
                            <td colspan="2">150-250</td>
                        </tr>

                        </tbody>
                        <!--                serology-->
                        <tbody v-if="patient.serology_flag">
                        <tr>
                            <th scope="row" colspan="2">Serology</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">HIV</td>
                            <td colspan="2">{{serology.hiv}}</td>
                            <td colspan="2">Reactive/N</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">HBSA</td>
                            <td colspan="2">{{serology.hbsa}}</td>
                            <td colspan="2">Reactive/N</td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">HCV</td>
                            <td colspan="2">{{serology.hcv}}</td>
                            <td colspan="2">Reactive/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">RA factor</td>
                            <td colspan="2">{{serology.ra}}</td>
                            <td colspan="2">Positive/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">CRD</td>
                            <td colspan="2">{{serology.crd}}</td>
                            <td colspan="2">p/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">ASO</td>
                            <td colspan="2">{{serology.aso}}</td>
                            <td colspan="2">P/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Widal Test</td>
                            <td colspan="2">{{serology.widal}}</td>
                            <td colspan="2">R/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">VDRL</td>
                            <td colspan="2">{{serology.vdrl}}</td>
                            <td colspan="2">R/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">TPHA</td>
                            <td colspan="2">{{serology.tpha}}</td>
                            <td colspan="2">P/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">UPT</td>
                            <td colspan="2">{{serology.upt}}</td>
                            <td colspan="2">P/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Helicobactor pylori(H.Pylori)</td>
                            <td colspan="2">{{serology.hpylori}}</td>
                            <td colspan="2">P/N</td>
                            <td colspan="2">150-250</td>
                        </tr>
                        <tr>
                            <td colspan="2">Food for occult Blood(FOB)</td>
                            <td colspan="2">{{serology.fob}}</td>
                            <td colspan="2">P/N</td>
                            <td colspan="2">150-250</td>
                        </tr>


                        </tbody>
                        <!--                urine-->
                        <tbody v-if="patient.urine_flag">
                        <tr>
                            <th scope="row" colspan="4">Urine</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="4">Physical</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr >
                            <td colspan="2">Color</td>
                            <td colspan="2">{{urinePhysical.color}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr >
                            <td colspan="2">Transparancy</td>
                            <td colspan="2">{{urinePhysical.transparency}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>

                        <tr >
                            <th scope="row" colspan="4">Chemical</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">pH</td>
                            <td colspan="2">{{urineChemical.ph}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Albumin</td>
                            <td colspan="2">{{urineChemical.albumin}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Sugar</td>
                            <td colspan="2">{{urineChemical.sugar}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>

                        <tr>
                            <th scope="row" colspan="4">Microscopic</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">Cast</td>
                            <td colspan="2">{{urineMircoscopic.cast}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr >
                            <td colspan="2">Crystal</td>
                            <td colspan="2">{{urineMircoscopic.crystal}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">pus cells</td>
                            <td colspan="2">{{urineMircoscopic.puscells}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">squamous epithelial cell</td>
                            <td colspan="2">{{urineMircoscopic.sec}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Erthrocytes</td>
                            <td colspan="2">{{urineMircoscopic.erythrocytes}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Yeast</td>
                            <td colspan="2">{{urineMircoscopic.yeast}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Calcium oxalate</td>
                            <td colspan="2">{{urineMircoscopic.calciumxalate}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Others</td>
                            <td colspan="2">{{urineMircoscopic.others}}</td>
                            <td colspan="2"></td>
                            <td colspan="2"></td>
                        </tr>
                        </tbody>
                        <!--                hematology-->
                        <tbody v-if="patient.hematology_flag">
                        <!--hematology-->
                        <tr>
                            <th scope="row" colspan="2">Hematology</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <!--Complete Blood Count-->
                        <tr>
                            <th scope="row" colspan="2">Complete Blood Count</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">Total Leukocytes Count</td>
                            <td colspan="2">{{hematologycbc.totalbc}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <!--differential leukocytes-->
                        <tr>
                            <th scope="row" colspan="2">Differential Leukocyte Count</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">Neutrophils</td>
                            <td colspan="2">{{hematologydlc.neurophils}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">Lymphocytes</td>
                            <td colspan="2">{{hematologydlc.lymphocytes}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">monocytes</td>
                            <td colspan="2">{{hematologydlc.monocytes}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">eosinophils</td>
                            <td colspan="2">{{hematologydlc.eosinophils}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">basophils</td>
                            <td colspan="2">{{hematologydlc.basophis}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <!--hematalogy-->
                        <tr>
                            <td colspan="2">Haemoglobin</td>
                            <td colspan="2">{{hematology.haemoglobin}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>

                        <tr>
                            <td colspan="2">plateletes count</td>
                            <td colspan="2">{{hematology.plateles}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">Blood grouping</td>
                            <td colspan="2">{{hematology.bloodgroup}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">Malarial parasites(optimal)</td>
                            <td colspan="2">{{hematology.malarialparasites}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>
                        <tr>
                            <td colspan="2">HBA1C</td>
                            <td colspan="2">{{hematology.hba1c}}</td>
                            <td colspan="2">/cumm</td>
                            <td colspan="2">4000 - 1100</td>
                        </tr>

                        </tbody>
                        <!--      BioChemistry          -->
                        <tbody>
                        <tr>
                            <th scope="row" colspan="2">BioChemistry</th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="2">Renal Function Test</th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr v-if=" biochemistryrtf.urea" >
                            <td></td>
                            <td >Urea</td>
                            <td>
                                <span v-bind:class=" [  1.3 < biochemistryrtf.urea  ? ActiveClass : '']">
                                    {{ biochemistryrtf.urea }}
                                </span>
                            </td>
                            <td >mg/dl</td>
                            <td >m(0.7-1.3),f(0.6-1.1)</td>
                        </tr>
                        <tr v-if="biochemistryrtf.creatinine">
                            <td></td>
                            <td>Creatine</td>
                            <td>{{biochemistryrtf.creatinine}}</td>
                            <td>mg/dl</td>
                            <td>m(0.7-1.3),f(0.6-1.1)</td>
                        </tr>
                        <tr v-if="biochemistryrtf.sodium" >
                            <td></td>
                            <td>Sodium</td>
                            <td>{{biochemistryrtf.sodium}}</td>
                            <td>mmol/l</td>
                            <td>135-145</td>
                        </tr>
                        <tr v-if="biochemistryrtf.potassium">
                            <td></td>
                            <td>Potassium</td>
                            <td>{{biochemistryrtf.potassium}}</td>
                            <td>mmol/l</td>
                            <td>3.5-5.5</td>
                        </tr>
                        <!--    Liver function test            -->
                        <tr>
                            <th scope="row">Liver Function Test</th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr v-if="biochemistrylft.bilirubin_total">
                            <td></td>
                            <td>Billrubin (Total)</td>
                            <td>{{biochemistrylft.bilirubin_total}}</td>
                            <td>mg/dl</td>
                            <td>0.2-1.2</td>
                        </tr>
                        <tr v-if="biochemistrylft.bilirubin_direct">
                            <td></td>
                            <td>Billrubin (direct)</td>
                            <td>{{biochemistrylft.bilirubin_direct}}</td>
                            <td>mg/dl</td>
                            <td>0.1-0.4</td>
                        </tr>
                        <tr v-if="biochemistrylft.sgpt_alt">
                            <td></td>
                            <td>SGPT (ALT)</td>
                            <td>{{biochemistrylft.sgpt_alt}}</td>
                            <td>IU/L</td>
                            <td>upto 40</td>
                        </tr>
                        <tr v-if="biochemistrylft.sgpt_ast">
                            <td></td>
                            <td>SGOT (AST)</td>
                            <td>{{biochemistrylft.sgpt_ast}}</td>
                            <td>IU/L</td>
                            <td>upto 40</td>
                        </tr>
                        <tr v-if="biochemistrylft.alkaline_phosphatase">
                            <td></td>
                            <td>Alkaline phosphatase (Total)</td>
                            <td>{{biochemistrylft.alkaline_phosphatase}}</td>
                            <td>U/L</td>
                            <td>80=290</td>
                        </tr>
                        <!--    bio            -->
                        <tr v-if="biochemistry.total_protein">
                            <td>Total Protein</td>
                            <td></td>
                            <td>{{biochemistry.total_protein}}</td>
                            <td>g/dl</td>
                            <td>6.0-8.0</td>
                        </tr>
                        <tr v-if="biochemistry.albumin">
                            <td>Albumin</td>
                            <td></td>
                            <td>{{biochemistry.albumin}}</td>
                            <td>g/dl</td>
                            <td>3.5-5.0</td>
                        </tr>
                        <tr v-if="biochemistry.sugar_f" >
                            <td>Sugar(F)</td>
                            <td></td>
                            <td>{{biochemistry.sugar_f}}</td>
                            <td>mg/dl</td>
                            <td>70=140</td>
                        </tr>
                        <tr v-if="biochemistry.sugar_pp" >
                            <td>Suagr(PP)</td>
                            <td></td>
                            <td>{{biochemistry.sugar_pp}}</td>
                            <td>mg/dl</td>
                            <td>70-140</td>
                        </tr>
                        <tr v-if="biochemistry.sugar_f" >
                            <td>Sugar(R)</td>
                            <td></td>
                            <td>{{biochemistry.sugar_r}}</td>
                            <td>mg/dl</td>
                            <td>70-140</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <br><br>
                <div class="signature" style="float: right">
                    <span>______________________</span><br>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Checked By</span>
                </div>

            </div>
        </div>
        <button @click="print" class="btn btn-sm btn-primary">
            <i class="material-icons">print</i>
            <span>Print Report</span>
        </button>
    </div>
</template>

<script>
    import Patient from "../../model/Patient";
    import BiochemistryLft from "../../model/BiochemistryLft";
    import BiochemistryRtf from "../../model/BiochemistryRtf";
    import Biochemistry from "../../model/Biochemistry";
    import HematologyDlc from "../../model/HematologyDlc";
    import HematologyCbc from "../../model/HematoCbc";
    import Hematology from "../../model/Hematology";
    import Lipid from "../../model/Lipid";
    import Serology from "../../model/serology";
    import UrinePhysical from "../../model/UrinePhysical";
    import UrineChemical from "../../model/UrineChemical";
    import UrineMicroscopic from "../../model/UrineMicroscopic";


    export default {
        name: "ViewReport",
        data() {
            return {
                url: "",
                d: new Date(),
                output: null,
                options: {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'},
                patient: new Patient(),
                lipid: new Lipid(),
                serology: new Serology(),
                urinePhysical: new UrinePhysical(),
                urineChemical: new UrineChemical(),
                urineMircoscopic: new UrineMicroscopic(),
                hematologydlc: new HematologyDlc(),
                hematologycbc: new HematologyCbc(),
                hematology: new Hematology(),
                biochemistrylft: new BiochemistryLft(),
                biochemistryrtf: new BiochemistryRtf(),
                biochemistry: new Biochemistry(),
            }
        },
        props: {
            id: {
                required: true,
                type: Number
            },
            tn: {
                required: true,
                type: String,
            },
        },
        created() {
            console.log(this.biochemistryrtf)
            this.url = 'patient/report' + '/' + this.id;
            axios.get(this.url).then(res => {
                this.patient = res.data.data.patient[0];
                this.lipid = res.data.data.lipid[0];
                this.serology = res.data.data.serology[0];
                this.urinePhysical = res.data.data.urine_physical[0];
                this.urineMircoscopic = res.data.data.urine_microscopics[0];
                this.urineChemical = res.data.data.urine_chemical[0];
                this.biochemistry = res.data.data.biochemistry[0];
                this.biochemistrylft = res.data.data.biochemistry_lft[0];
                this.biochemistryrtf = res.data.data.biochemistry_rft[0];
                this.hematology = res.data.data.hematology[0];
                this.hematologycbc = res.data.data.hematology_cbc[0];
                this.hematologydlc = res.data.data.hematology_dlc[0];
                console.log('hello',res.data.data.biochemistry[0]);


            })
        },
        methods: {
            print() {
                // Pass the element id here
                this.$htmlToPaper('printMe');
            },

        }

    }
</script>

<style scoped>
    .ActiveClass{
        font-weight: bold;
        font-size: 30px;
        color: red;
    }
</style>
