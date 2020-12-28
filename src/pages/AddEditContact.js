import React, { useRef, useState, useEffect, Fragment } from 'react';
import {
  KeyboardAvoidingView,
  SafeAreaView,
  StyleSheet,
  Text,
  ToastAndroid,
  View,
} from 'react-native';
import {
  ScrollView,
  TextInput,
  TouchableOpacity,
} from 'react-native-gesture-handler';

import Header from '../components/Header';
import { useNavigation } from '@react-navigation/native';
import { Formik } from 'formik';
import Button from '../components/Button';
import axios from 'axios'

export default function AddEditContact({ route, navigation }) {
  const [contactData, setContactData] = useState({
    FIRST: '',
    LAST: '',
    COMPANY: '',
    TITLE: '',
    OFFICE: '',
    CELLPHONE: '',
    EMAIL: '',
    INDUSTRY: '',
    COMMENT: '',
    MEMO: '',
    MinCapRate: '',
    MaxPSF: '',
    unit: '',
    MaxGRM: '',
    ADDRESS: '',
    CITY: '',
    STATE: '',
    ZIP: '',
    RecordNo: '',
    HOME: '',
    active_buyer: '',
    EXCLSVBUYR: '',
    RATECOMMIS: '',
    SIGNDATEXL: '',
    EXPIRAEXCL: '',
    WEBSITE: '',
  });

  const [submit, setSubmit] = useState(false)

  const [headerText, setHeaderText] = useState('Add Contact')

  useEffect(() => {
    let routeParams = route.params


    if (routeParams.edit) {

      let currentContact = routeParams.contact


      let payload = {};
      payload['key'] = "select";
      payload['id'] = +currentContact.id;

      axios.post('contacts.php?paccess=Apiandaccess', payload).then(res => {
        const result = res.data;

        setHeaderText("Update Contact")

        setContactData(result)



      }).catch(err => {
        setSubmit(false)

      })
    }

    return () => {

    }
  }, [])

  const onSubmit = async (values) => {

    let payload = values

    setSubmit(true)

    let routeParams = route.params
    if (routeParams.edit) {
      let currentContact = routeParams.contact

      payload['key'] = "update";
      payload['id'] = currentContact.id;

      console.log(payload)

      axios.post('contacts.php?paccess=Apiandaccess', payload).then(res => {
        const result = res.data;

        console.log(result)
        setSubmit(false);
        ToastAndroid.show("Contact Updated Successfully", ToastAndroid.SHORT);

        navigation.goBack()
      }).catch(err => {
        setSubmit(false)

      })
    } else {
      payload['key'] = "create";

      axios.post('contacts.php?paccess=Apiandaccess', payload).then(res => {
        const result = res.data;
        setSubmit(false);
        ToastAndroid.show("Contact Added Successfully", ToastAndroid.SHORT);

        navigation.goBack()
      }).catch(err => {
        setSubmit(false)

      })

    }

  };

  return (
    <SafeAreaView style={{ flex: 1 }}>

      <KeyboardAvoidingView
        behavior="height"
        enabled={true}
        style={{
          flex: 1,
          backgroundColor: '#FCFCFC',
        }}>

        <Formik
          initialValues={contactData}
          onSubmit={(values) => { onSubmit(values) }}
          enableReinitialize={true}
        //   validationSchema={}
        //   onSubmit={}
        >
          {({ values, handleChange, errors, touched, isValid, handleSubmit }) => (
            <ScrollView
              contentContainerStyle={{
                flexGrow: 1,
                justifyContent: 'flex-start',
              }}>
              <Header
                showBack={true}
                headerText={headerText}
                backEvent={() => {
                  navigation.pop();
                }}
              ></Header>
              <View style={styles.container}>
                <TextInput
                  style={styles.textField}
                  value={values.FIRST}
                  autoCapitalize="none"
                  onChangeText={handleChange('FIRST')}
                  placeholder="First Name"
                />

                <TextInput
                  style={styles.textField}
                  value={values.LAST}
                  autoCapitalize="none"
                  onChangeText={handleChange('LAST')}
                  placeholder="Last Name"
                />

                <TextInput
                  style={styles.textField}
                  value={values.COMPANY}
                  autoCapitalize="none"
                  onChangeText={handleChange('COMPANY')}
                  placeholder="COMPANY"
                />

                <TextInput
                  style={styles.textField}
                  value={values.TITLE}
                  autoCapitalize="none"
                  onChangeText={handleChange('TITLE')}
                  placeholder="TITLE"
                />

                <TextInput
                  style={styles.textField}
                  value={values.OFFICE}
                  autoCapitalize="none"
                  onChangeText={handleChange('OFFICE')}
                  placeholder="OFFICE"
                />

                <TextInput
                  style={styles.textField}
                  value={values.CELLPHONE}
                  autoCapitalize="none"
                  onChangeText={handleChange('CELLPHONE')}
                  placeholder="CELLPHONE"
                />

                <TextInput
                  style={styles.textField}
                  value={values.EMAIL}
                  autoCapitalize="none"
                  onChangeText={handleChange('EMAIL')}
                  placeholder="EMAIL"
                />

                <TextInput
                  style={styles.textField}
                  value={values.INDUSTRY}
                  autoCapitalize="none"
                  onChangeText={handleChange('INDUSTRY')}
                  placeholder="INDUSTRY"
                />

                <TextInput
                  style={styles.textField}
                  value={values.COMMENT}
                  autoCapitalize="none"
                  onChangeText={handleChange('COMMENT')}
                  placeholder="COMMENT"
                />

                <TextInput
                  style={styles.textField}
                  value={values.MEMO}
                  autoCapitalize="none"
                  onChangeText={handleChange('MEMO')}
                  placeholder="MEMO"
                />

                <TextInput
                  style={styles.textField}
                  value={values.MinCapRate}
                  autoCapitalize="none"
                  onChangeText={handleChange('MinCapRate')}
                  placeholder="MinCapRate"
                />

                <TextInput
                  style={styles.textField}
                  value={values.MaxPSF}
                  autoCapitalize="none"
                  onChangeText={handleChange('MaxPSF')}
                  placeholder="MaxPSF"
                />

                <TextInput
                  style={styles.textField}
                  value={values.unit}
                  autoCapitalize="none"
                  onChangeText={handleChange('unit')}
                  placeholder="unit"
                />

                <TextInput
                  style={styles.textField}
                  value={values.MaxGRM}
                  autoCapitalize="none"
                  onChangeText={handleChange('MaxGRM')}
                  placeholder="MaxGRM"
                />

                <TextInput
                  style={styles.textField}
                  value={values.ADDRESS}
                  autoCapitalize="none"
                  onChangeText={handleChange('ADDRESS')}
                  placeholder="ADDRESS"
                />

                <TextInput
                  style={styles.textField}
                  value={values.CITY}
                  autoCapitalize="none"
                  onChangeText={handleChange('CITY')}
                  placeholder="CITY"
                />

                <TextInput
                  style={styles.textField}
                  value={values.STATE}
                  autoCapitalize="none"
                  onChangeText={handleChange('STATE')}
                  placeholder="STATE"
                />

                <TextInput
                  style={styles.textField}
                  value={values.ZIP}
                  autoCapitalize="none"
                  onChangeText={handleChange('ZIP')}
                  placeholder="ZIP"
                />

                <TextInput
                  style={styles.textField}
                  value={values.RecordNo}
                  autoCapitalize="none"
                  onChangeText={handleChange('RecordNo')}
                  placeholder="RecordNo"
                />

                <TextInput
                  style={styles.textField}
                  value={values.HOME}
                  autoCapitalize="none"
                  onChangeText={handleChange('HOME')}
                  placeholder="HOME"
                />

                <TextInput
                  style={styles.textField}
                  value={values.active_buyer}
                  autoCapitalize="none"
                  onChangeText={handleChange('active_buyer')}
                  placeholder="active_buyer"
                />

                <TextInput
                  style={styles.textField}
                  value={values.EXCLSVBUYR}
                  autoCapitalize="none"
                  onChangeText={handleChange('EXCLSVBUYR')}
                  placeholder="EXCLSVBUYR"
                />

                <TextInput
                  style={styles.textField}
                  value={values.RATECOMMIS}
                  autoCapitalize="none"
                  onChangeText={handleChange('RATECOMMIS')}
                  placeholder="RATECOMMIS"
                />

                <TextInput
                  style={styles.textField}
                  value={values.SIGNDATEXL}
                  autoCapitalize="none"
                  onChangeText={handleChange('SIGNDATEXL')}
                  placeholder="SIGNDATEXL"
                />

                <TextInput
                  style={styles.textField}
                  value={values.EXPIRAEXCL}
                  autoCapitalize="none"
                  onChangeText={handleChange('EXPIRAEXCL')}
                  placeholder="EXPIRAEXCL"
                />

                <TextInput
                  style={styles.textField}
                  value={values.WEBSITE}
                  autoCapitalize="none"

                  onChangeText={handleChange('WEBSITE')}
                  placeholder="WEBSITE"
                />

                <Button
                  handler={handleSubmit}
                  text="Submit"
                  disabled={submit}
                  btnStyle={styles.btn}></Button>
              </View>

            </ScrollView>
          )}
        </Formik>
      </KeyboardAvoidingView>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f9f8fe',
    width: '100%',
    paddingVertical: 20,
    paddingHorizontal: 10,
    alignItems: 'center',
  },
  textField: {
    height: 50,
    padding: 10,
    marginBottom: 10,
    borderColor: '#525252',
    // borderWidth: 1,
    borderBottomWidth: 1,
    width: '100%',
    borderRadius: 15,
    // elevation: 1,
    shadowColor: "#f5f5f5"

  },
  btn: {
    width: '80%',
    backgroundColor: '#0071cd',
  },
  btnText: {
    color: 'white',
  },
});
