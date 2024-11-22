import admin from 'firebase-admin';
import { getFirestore, Timestamp, FieldValue, Filter } from 'firebase-admin/firestore';

var serviceAccount = "./storage/app/private/sumare-io-firebase-adminsdk-zpf43-ad238f155e.json";
var app;

app = admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://sumare-io-default-rtdb.firebaseio.com"
});

const db = getFirestore(app);

const citiesRef = db.collection('receivers');
const snapshot = await citiesRef.where('code', '==', '123').get();
if (snapshot.empty) {
  console.log(snapshot);

}  

snapshot.forEach(doc => {
  console.log(doc.id, '=>', doc.data());
});