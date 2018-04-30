import React, { Component } from 'react';
import { View, StyleSheet, ScrollView , Dimensions, Image, StatusBar,BackHandler, ToastAndroid , TouchableOpacity } from 'react-native';


const StatusBarCustom = () =>{
    return (
        <StatusBar
            backgroundColor="#606062"
            barStyle="light-content"
            animated
        />
    )
};

export default StatusBarCustom;