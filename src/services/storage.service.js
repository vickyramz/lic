import AsyncStorage from '@react-native-async-storage/async-storage';

export const storage = {
  storeData: async (key, value) => {
    try {
      await AsyncStorage.setItem(key, value);
      return true;
    } catch (error) {
      return null;
      // Error saving data
    }
  },

  retrieveData: async (key) => {
    try {
      const value = await AsyncStorage.getItem(key);
      if (value !== null) {
        // We have data!!
        return value;
      }
    } catch (error) {
      return null;
      // Error retrieving data
    }
  },

  deleteData: async (key) => {
    try {
      const value = await AsyncStorage.removeItem(key);
      if (value !== null) {
        // We have data!!
        return value;
      }
    } catch (error) {
      return null;
      // Error retrieving data
    }
  },
};
