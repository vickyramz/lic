import React, { useRef, useState, useEffect } from 'react';
import { RefreshControl, SafeAreaView, StyleSheet, Text, ToastAndroid, View } from 'react-native';
import { FlatList, TouchableOpacity, TouchableWithoutFeedback } from 'react-native-gesture-handler';

import Header from '../components/Header';
import axios from 'axios'
import Spinner from 'react-native-loading-spinner-overlay';

const Item = ({ first, last, email }) => (
  <View style={styles.item}>
    <Text style={styles.name}>{first} {last}</Text>
    <Text style={styles.email}>{email}</Text>

  </View>
);
import SearchBar from 'react-native-search-bar';

export default function Contacts({ navigation }) {
  //   const navigation = useNavigation();

  const [contacts, setContacts] = useState([])
  const [refreshing, setRefreshing] = React.useState(false);
  const [spinner, setSpinner] = React.useState(false);
  const [searchString, setsearchString] = React.useState(false);
  const searchBar = useRef()
  useEffect(() => {
    getData();
  }, []);

  const getData = () => {
    setRefreshing(true);
    setSpinner(true);


    axios.get('get_contacts.php?paccess=Apiandaccess').then(res => {

      setContacts(res.data);
      setRefreshing(false);
      setSpinner(false);
    }).catch(err => {
      setRefreshing(false);
      setSpinner(false);

    })
  }

  const renderItem = ({ item }) => (
    <TouchableWithoutFeedback onPress={() => { navigation.navigate('AddEditContact', { edit: true, contact: item }) }}>
      <Item first={item.FIRST} last={item.LAST} email={item.EMAIL} />
    </TouchableWithoutFeedback>
  );

  const onSearch = async (value) => {
    setsearchString(value)


    let payload = {
      key: 'search',
      sphase: value
    };

    let res = await axios.post('contacts.php?paccess=Apiandaccess', payload)

    setContacts(res.data)

    console.log(res.data)

  }

  const loadMore = async () => {

  }

  return (
    <SafeAreaView style={{ flex: 1 }}>
      <Header
        headerText="Contacts"
        hasAction={true}
        actionText="Add"
        actionEvent={() => {
          navigation.navigate('AddEditContact', { edit: false });
        }}
        showBack={true}
        backEvent={() => {
          navigation.pop();
        }}></Header>

      <Spinner
        visible={spinner}
        textContent={'Fetching Contacts...'}
      />
      <View style={styles.container}>

        <SearchBar
          ref={searchBar}
          placeholder="Search"
          onChangeText={(value) => onSearch(value)}
          textColor="#000"

        // onSearchButtonPress={...}
        // onCancelButtonPress={...}
        />
        <FlatList
          data={contacts}
          renderItem={renderItem}
          keyExtractor={item => item.id}
          refreshControl={<RefreshControl refreshing={refreshing} onRefresh={getData} />}
          initialNumToRender={20}
          onEndReachedThreshold={5}
          onEndReached={() => {
            loadMore()
          }}
        />
      </View>
    </SafeAreaView>
  );
}


const styles = StyleSheet.create({

  container: {
    flex: 1,
    backgroundColor: '#fff',
    width: '100%',
    paddingHorizontal: 20,
  },
  item: {
    width: '100%',
    height: 80,
    borderRadius: 8,
    backgroundColor: '#f8f9fd',
    paddingHorizontal: 30,
    shadowColor: '#000',
    shadowOffset: { width: 1, height: 1 },
    shadowOpacity: 0.4,
    shadowRadius: 3,
    marginVertical: 10,
    elevation: 1
  },
  name: {
    fontSize: 18,
    color: '#2d3440',
    paddingTop: 10,
  },
  email: {
    fontSize: 16,
    color: '#b9b9b9',
    paddingTop: 5,
  },
  searchBar: {
    color: "#000"
  }

});
