import React, { useRef, Fragment, useEffect, useState } from "react";
import {
  StyleSheet,
  Text,
  View,
  TextInput,

  Image,
  KeyboardAvoidingView,
  Alert
} from "react-native";
import { Formik } from "formik";

import { ScrollView } from "react-native-gesture-handler";
import Header from "../components/Header";
import Button from "../components/Button";
import { storage } from "../services/storage.service";

export default function Login({ navigation }) {

  const [error, setError] = useState('')
  const [submit, changeSubmit] = useState(false)


  useEffect(() => {
    initializeRoute()
  }, [])

  const initializeRoute = async () => {
    const loggedIn = await storage.retrieveData('loggedIn')
    if (loggedIn) {
      navigation.replace('Home')
    }
  }

  const onSubmit = (values) => {

    storage.storeData("loggedIn", "true")
    navigation.replace('Home')

  }


  return (

    <KeyboardAvoidingView behavior='height' enabled={true} style={{
      flex: 1,
      backgroundColor: '#fff'
    }}>
      <Header headerText="Login"></Header>
      <ScrollView style={styles.container} contentContainerStyle={{ flexGrow: 1 }} >

        <View style={{
          justifyContent: 'center',
          alignItems: 'center',
        }}>
          <Image
            style={{ marginBottom: 0, width: 250, height: 250 }}
            source={require("../assets/images/logo.png")}
          />
        </View>
        <Formik

          initialValues={
            {
              email: "",
              password: ""
            }
          }
          onSubmit={(values) => { onSubmit(values) }}
          enableReinitialize={true}
        //   validationSchema={}
        //   onSubmit={}
        >
          {({ values, handleChange, errors, touched, isValid, handleSubmit }) => (

            <View>
              <TextInput
                style={styles.textField}
                value={values.email}
                autoCapitalize="none"

                onChangeText={handleChange('email')}
                placeholder="Email Address"
              />

              <TextInput
                style={styles.textField}
                value={values.password}
                autoCapitalize="none"

                onChangeText={handleChange('password')}
                placeholder="Password"
              />
              <Button
                handler={handleSubmit}
                text="Login"
                btnStyle={styles.btn}></Button>
            </View>
          )}
        </Formik>
      </ScrollView>
    </KeyboardAvoidingView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    paddingHorizontal: 20,
    backgroundColor: '#fff',
  },
  form: {
    marginTop: "50%"
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
  header: {
    fontSize: 35,
    fontWeight: "bold",
    marginBottom: "15%",
    fontFamily: "nunito",
  },
  btn: {
    width: '100%',
    backgroundColor: '#0071cd',
    borderRadius: 5
  },
  btnText: {
    color: 'white',
  },

});
